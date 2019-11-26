<?php

namespace services;

use services\Interfaces\RefreshPopupInterface;

class RefreshPopup implements RefreshPopupInterface
{
    /**
     * @param $session
     */
    public function refreshPopup($session)
    {
        if ($session->get('success')!= null) {
            $session->delete('success');
        } elseif ($session->get('error')!= null) {
            $session->delete('error');
        }
    }
}
