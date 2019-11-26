<?php

namespace services\Testing;

use services\Testing\Interfaces\TokenTestingInterface;

class TokenTesting implements TokenTestingInterface
{
    /**
     * @param $session
     * @param $postToken
     * @return string
     */
    public function tokenTesting($session, $postToken)
    {
        if ($session->get('token') != $postToken) {
            return 'Erreur de vérification';
        } else {
            return null;
        }
    }
}
