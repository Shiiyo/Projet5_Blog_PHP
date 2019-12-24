<?php

namespace services\Check\Interfaces;

interface CheckAdminLoginInterface
{
    /**
     * @param $container
     * @param $session
     * @return mixed
     */
    public function checkAdminLogin($container, $session);
}
