<?php

namespace framework\Session\Interfaces;

interface TokenManagementInterface
{
    /**
     * @param $session
     * @return string
     * @throws \Exception
     */
    public function generateToken($session);
}
