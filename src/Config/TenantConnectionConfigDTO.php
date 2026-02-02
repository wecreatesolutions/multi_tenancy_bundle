<?php

namespace Hakam\MultiTenancyBundle\Config;

use Hakam\MultiTenancyBundle\Enum\DatabaseStatusEnum;
use Hakam\MultiTenancyBundle\Enum\DriverTypeEnum;
use Hakam\MultiTenancyBundle\Services\TenantDbConfigurationInterface;

/**
 * @author Ramy Hakam <pencilsoft1@gmail.com
 */
class TenantConnectionConfigDTO
{
    private function __construct(
        public mixed $identifier,
        public DriverTypeEnum $driver,
        public DatabaseStatusEnum $dbStatus,
        public string $host,
        public int $port,
        public string $dbname,
        public string $user,
        public ?string $password = null
    )
    {
    }

    public static function fromTenantDbConfiguration(TenantDbConfigurationInterface $tenantDbConfig): self
    {
        return self::fromArgs(
            identifier: $tenantDbConfig->getIdentifierValue() ?? null,
            driver: $tenantDbConfig->getDriverType(),
            dbStatus: $tenantDbConfig->getDatabaseStatus(),
            host: $tenantDbConfig->getDbHost(),
            port: $tenantDbConfig->getDbPort(),
            dbname: $tenantDbConfig->getDbName(),
            user: $tenantDbConfig->getDbUserName(),
            password: $tenantDbConfig->getDbPassword()
        );
    }

    public static function fromArgs(
        mixed $identifier,
        DriverTypeEnum $driver,
        DatabaseStatusEnum $dbStatus,
        string $host,
        int $port,
        string $dbname,
        string $user,
        ?string $password = null
    ): self
    {
        return new self($identifier, $driver, $dbStatus, $host, $port, $dbname, $user, $password);
    }

    public function withId(int $id): self
    {
        return new self(
            $id,
            $this->driver,
            $this->dbStatus,
            $this->host,
            $this->port,
            $this->dbname,
            $this->user,
            $this->password
        );
    }
}
