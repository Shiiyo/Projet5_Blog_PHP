<?php

namespace Controller\Admin;

use Controller\ControllerTrait;
use Controller\ControllerInterface;

class AdminConnectionController implements ControllerInterface
{
    use ControllerTrait;

    public function __invoke()
    {
        $view = $this->getTwig()->render('admin/connection.html.twig');
        $response = $this->getContainer()->newHttpResponseHtml($view);
        $response->send();

        if ($this->session->get('error')!= null) {
            $this->session->delete('error');
        }
    }
}
