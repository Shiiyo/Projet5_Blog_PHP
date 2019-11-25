<?php

namespace services;

use services\Interfaces\AdminLogInInterface;

class AdminLogIn implements AdminLogInInterface
{
    public function testLogIn($uuid, $container)
    {
        if ($uuid != null) {
            $adminLoader = $container->getAdminLoader($container);
            $admin = $adminLoader->findOneByUuid($uuid);
            if ($admin == false) {
                return false;
            } else {
                return $admin;
            }
        } else {
            return false;
        }
    }
}
