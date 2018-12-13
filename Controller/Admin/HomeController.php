<?php

namespace Controller\Admin;

use Controller\ControllerInterface;
use Controller\ControllerTrait;

class HomeController implements ControllerInterface
{
    use ControllerTrait;

    public function __invoke()
    {
        if ($this->session->get('uuid')!= null) {
            $adminLoader = $this->container->getAdminLoader($this->container);
            $admin = $adminLoader->findOneByUuid($this->session->get('uuid'));
            if ($admin == false) {
                $this->session->delete('uuid');
                $this->redirect('/admin/login');
            } else {
                $view = $this->getTwig()->render('admin/homepage.html.twig', ['admin' => $admin]);
                $response = $this->getContainer()->newHttpResponseHtml($view);
                $response->send();
            }
        } else {
            $this->redirect('/admin/login');
        }
    }
}