<?php

namespace Controller\Admin;

use Controller\ControllerTrait;
use Controller\ControllerInterface;

class AdminAccountController implements ControllerInterface
{
    use ControllerTrait;

    public function __invoke()
    {
        if ($this->session->get('uuid')!= null) {
            $adminLoader = $this->container->getAdminLoader($this->container);
            $adminLogIn = $adminLoader->findOneByUuid($this->session->get('uuid'));

            if ($adminLogIn == false) {
                $this->session->delete('uuid');
                $this->redirect('/admin/login');
            } else {
                $adminUuid = $this->container->newEndParamURI()->getEndParamURI();
                $token = $this->container->newTokenManagement()->generateToken($this->session);
                $admin = $adminLoader->findOneByUuid($adminUuid);

                $view = $this->getTwig()->render('admin/administratorAccount.html.twig', ['admin' => $admin, 'token' => $token]);
                $response = $this->getContainer()->newHttpResponseHtml($view);
                $response->send();
            }
        } else {
            $this->redirect('/admin/login');
        }
    }
}
