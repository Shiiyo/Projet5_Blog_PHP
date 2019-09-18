<?php

namespace services\Builders;

use Entity\Admin;

class AdminBuilder implements BuilderInterface
{
    public function build($adminArray)
    {
        $admin = new Admin();
        $admin->setId($adminArray['id']);
        $admin->setName($adminArray['name']);
        $admin->setFirstName($adminArray['first_name']);
        $admin->setPseudo($adminArray['pseudo']);
        $admin->setEmail($adminArray['email']);
        $admin->setPassword($adminArray['password']);
        return $admin;
    }
}
