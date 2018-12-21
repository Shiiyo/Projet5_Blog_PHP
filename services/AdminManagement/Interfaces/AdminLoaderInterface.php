<?php


namespace services\AdminManagement\Interfaces;

use framework\DependencyInjectionContainer;
use services\AdminManagement\AdminCollection;

interface AdminLoaderInterface
{
    /**
     * AdminLoaderInterface constructor.
     * @param AdminStorageInterface $adminStorage
     * @param DependencyInjectionContainer $container
     */
    public function __construct($adminStorage, $container);

    /**
     * @return AdminCollection
     */
    public function getAdminCollection();

    /**
     * @param int $id
     * @return mixed
     */
    public function findOneById($article);

    /**
     * @param $uuid
     * @return bool|\Entity\Admin|mixed
     */
    public function findOneByUuid($uuid);
}
