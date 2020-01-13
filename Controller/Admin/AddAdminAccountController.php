<?php


namespace Controller\Admin;

use Controller\ControllerInterface;
use Controller\ControllerTrait;

class AddAdminAccountController implements ControllerInterface
{
    use ControllerTrait;

    public function __invoke()
    {
        $adminLogIn = $this->container->newCheckAdminLogin()->checkAdminLogin($this->container, $this->session);
        $token = $this->container->newTokenManagement()->generateToken($this->session);

        if ($adminLogIn != false) {
            $view = $this->getTwig()->render('admin/addAdminAccount.html.twig', ['token'=>$token]);
            $response = $this->getContainer()->newHttpResponseHtml($view);
            $response->send();
        } else {
            $this->session->delete('uuid');
            $this->redirect('/admin/login');
        }

        $this->container->newRefreshPopup()->refreshPopup($this->session);
    }
}
