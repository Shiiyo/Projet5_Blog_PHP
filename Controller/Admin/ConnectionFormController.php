<?php

namespace Controller\Admin;

use Controller\ControllerInterface;
use Controller\ControllerTrait;

class ConnectionFormController implements ControllerInterface
{
    use ControllerTrait;

    public function __invoke()
    {
        $request = $this->getContainer()->newHttpRequest();

        //Testing form fields
        $error_msg = $this->container->newConnectionTestingFields()->connectionTestingFields($this->container, $request, $this->session);

        if ($error_msg == "") {
            $admin = $this->container->getAdminLoader($this->container)->findOneByPseudo($request->request->get('pseudo'));
            if ($admin == false) {
                $this->session->set('error', "L'identifiant ou le mot de passe est incorrect");
                $this->redirect('/admin/login');
            } else {
                $testPassword = password_verify($request->request->get('mdp'), $admin->getPassword());
                if ($testPassword == false) {
                    $this->session->set('error', "L'identifiant ou le mot de passe est incorrect");
                    $this->redirect('/admin/login');
                } else {
                    $this->session->set('uuid', $admin->getId());
                    $this->redirect('/admin/accueil');
                }
            }
        } else {
            $this->session->set('error', $error_msg);
            $this->redirect('/admin/login');
        }
    }
}
