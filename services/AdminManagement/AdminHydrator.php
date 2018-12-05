<?php

namespace services\AdminManagement;

use Entity\Admin;

class AdminHydrator
{
    /**
     * @param $adminArray
     * @param Admin $adminEntity
     */
    public function hydrate($adminArray, $adminEntity)
    {
        $adminEntity->setId($adminArray['id']);
        $adminEntity->setName($adminArray['name']);
        $adminEntity->setFirstName($adminArray['first_name']);
        $adminEntity->setEmail($adminArray['email']);
        $adminEntity->setPassword($adminArray['password']);
    }
}
