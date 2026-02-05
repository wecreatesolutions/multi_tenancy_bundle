# v2.9.3.4
* DoctrineTenantDatabaseManager - fix lazy repository init to prevent DoctrineMetadataCacheWarmer failure in no-debug warmup

# v2.9.3.3
* SwitchDbEvent – allow to set tenant entity
* CreateDatabaseCommand – allow identifier to be string
* DbSwitchEventListener - allow to use new SwitchDbEvent method to retrieve the tenant entity
* introduced helper method TenantConnectionConfigDTO::fromTenantDbConfiguration - reduce code duplication

# v2.9.3.2
* update depencendy versions
* convert services.xml to services.yaml
* fix - don't allow url and host and port to be defined
* remove packages
* remove hakam.tenant_purger_factory when Doctrine\\Bundle\\FixturesBundle\\Purger\\PurgerFactory is not available
* remove Hakam\MultiTenancyBundle\Services\DbService - seems to be redundant
* fix for CreateDatabaseCommand - allow tenant id to be string
* reformat code

# v2.9.3.1
* package upgrades

