<?php

namespace services\Testing\Interfaces;

interface TestAdminLoginInterface
{
    /**
     * @param $container
     * @param $session
     * @return mixed
     */
    public function testAdminLogin($container, $session);
}
