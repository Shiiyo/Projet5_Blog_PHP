<?php

namespace services;

use services\Interfaces\TestAdminLogInInterface;

class TestAdminLogIn implements TestAdminLogInInterface
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
