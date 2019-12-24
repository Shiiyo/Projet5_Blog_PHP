<?php

namespace services\Check\Interfaces;

interface TokenCheckInterface
{
    /**
     * @param $session
     * @param $postToken
     * @return string
     */
    public function tokenCheck($session, $postToken);
}
