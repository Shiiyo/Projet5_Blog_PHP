<?php


namespace services\Check;

use services\Check\Interfaces\CheckAdminLoginInterface;

class CheckAdminLogin implements CheckAdminLoginInterface
{
    /**
     * @param $container
     * @param $session
     * @return mixed
     */
    public function checkAdminLogin($container, $session)
    {
        $AdminLogIn = $container->newAdminLogIn();
        return $AdminLogIn->testLogIn($session->get('uuid'), $container);
    }
}
