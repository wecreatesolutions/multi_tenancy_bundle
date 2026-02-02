<?php

namespace Hakam\MultiTenancyBundle\Event;

use Hakam\MultiTenancyBundle\Services\TenantDbConfigurationInterface;
use Symfony\Contracts\EventDispatcher\Event;

/**
 * @author Ramy Hakam <pencilsoft1@gmail.com>
 */
class SwitchDbEvent extends Event
{
    private ?TenantDbConfigurationInterface $tenant;

    private ?string $dbIndex;

    public function __construct(string|TenantDbConfigurationInterface|null $tenantOrTenantIdentifier)
    {
        if ($tenantOrTenantIdentifier instanceof TenantDbConfigurationInterface) {
            $this->tenant  = $tenantOrTenantIdentifier;
            $this->dbIndex = $tenantOrTenantIdentifier->getIdentifierValue();
        } else {
            $this->tenant  = null;
            $this->dbIndex = $tenantOrTenantIdentifier;
        }
    }

    public function getDbIndex(): ?string
    {
        return $this->dbIndex;
    }

    public function getTenantDbConfiguration(): ?TenantDbConfigurationInterface
    {
        return $this->tenant;
    }
}
