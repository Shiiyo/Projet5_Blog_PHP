<?php

namespace framework\Session;

use framework\Session\Interfaces\TokenManagementInterface;

class TokenManagement implements TokenManagementInterface
{
    /**
     * @param $session
     * @return string
     * @throws \Exception
     */
    public function generateToken($session)
    {
        if (empty($session->get('token'))) {
            $token = bin2hex(random_bytes(32));
            $session->set('token', $token);
            return $token;
        } else {
            return $session->get('token');
        }
    }
}
