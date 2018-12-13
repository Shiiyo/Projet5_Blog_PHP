<?php


namespace services\AdminManagement\Interfaces;

use framework\DependencyInjectionContainer;

interface AdminLoaderInterface
{
    /**
     * AdminLoaderInterface constructor.
     * @param AdminStorageInterface $adminStorage
     * @param DependencyInjectionContainer $container
     */
    public function __construct($adminStorage, $container);

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
