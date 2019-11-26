<?php

namespace services\Testing\Interfaces;

interface TokenTestingInterface
{
    /**
     * @param $session
     * @param $postToken
     * @return string
     */
    public function tokenTesting($session, $postToken);
}
