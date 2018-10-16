<?php

namespace Controller\Admin;

use Controller\ControllerInterface;
use Controller\ControllerTrait;

echo "Admin Page d'accueil";

class AdminHomeController implements ControllerInterface
{
    use ControllerTrait;

    /**
     * Implement the right view
     */
    public function index()
    {
        // TODO: Implement index() method.
    }
}
