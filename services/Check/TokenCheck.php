<?php

namespace services\Check;

use services\Check\Interfaces\TokenCheckInterface;

class TokenCheck implements TokenCheckInterface
{
    /**
     * @param $session
     * @param $postToken
     * @return string
     */
    public function tokenCheck($session, $postToken)
    {
        if ($session->get('token') != $postToken) {
            return 'Erreur de vérification';
        } else {
            return null;
        }
    }
}
