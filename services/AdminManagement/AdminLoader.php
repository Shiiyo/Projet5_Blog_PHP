<?php


namespace services\AdminManagement;

use framework\DependencyInjectionContainer;
use services\AdminManagement\Interfaces\AdminStorageInterface;

class AdminLoader
{
    private $adminStorage;
    private $container;
    private $adminHydrator;

    /**
     * ArticleLoader constructor.
     * @param AdminStorageInterface $adminStorage
     * @param DependencyInjectionContainer $container
     */
    public function __construct($adminStorage, $container)
    {
        $this->adminStorage = $adminStorage;
        $this->container = $container;
    }

    /**
     * @param int $id
     */
    public function findOneById($id)
    {
        $adminArray = $this->adminStorage->fetchSingleAdmin($id);
        if ($this->adminHydrator === null) {
            $this->adminHydrator = $this->container->newAdminHydrator();
        }
        $admin = $this->container->newAdmin();
        $this->adminHydrator->hydrate($adminArray[0], $admin);
        return $admin;
    }
}
