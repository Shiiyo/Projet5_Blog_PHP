<?php


namespace services\Testing;

use services\Testing\Interfaces\TestAdminLoginInterface;

class TestAdminLogin implements TestAdminLoginInterface
{
    /**
     * @param $container
     * @param $session
     * @return mixed
     */
    public function testAdminLogin($container, $session)
    {
        $AdminLogIn = $container->newAdminLogIn();
        return $AdminLogIn->testLogIn($session->get('uuid'), $container);
    }
}
