<?php


namespace services\AdminManagement\Interfaces;

use Entity\Admin;

interface AdminHydrator
{
    /**
     * @param $adminArray
     * @param Admin $adminEntity
     */
    public function hydrate($adminArray, $adminEntity);
}
