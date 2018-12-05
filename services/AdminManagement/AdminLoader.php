<?php


namespace services\AdminManagement;

use framework\DependencyInjectionContainer;
use services\AdminManagement\Interfaces\AdminStorageInterface;

class AdminLoader
{
    private $adminStorage;
    private $container;
    private $adminBuilder;

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
    public function findOneById($article)
    {
        $adminArray = $this->adminStorage->fetchSingleAdmin($article);
        if ($this->adminBuilder === null) {
            $this->adminBuilder = $this->container->newAdminBuilder();
        }
        $admin = $this->adminBuilder->build($adminArray[0]);
        return $admin;
    }
}
