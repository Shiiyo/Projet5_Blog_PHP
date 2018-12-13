<?php

namespace Controller\Admin;

use Controller\ControllerInterface;
use Controller\ControllerTrait;

class DeconnexionController implements ControllerInterface
{
    use ControllerTrait;

    public function __invoke()
    {
        $this->session->delete('uuid');
        $this->redirect('/accueil');
    }
}
