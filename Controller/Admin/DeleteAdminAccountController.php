<?php

namespace Controller\Admin;

use Controller\ControllerInterface;
use Controller\ControllerTrait;

class DeleteAdminAccountController implements ControllerInterface
{
    use ControllerTrait;

    public function __invoke()
    {
        $adminLogIn = $this->container->newCheckAdminLogin()->checkAdminLogin($this->container, $this->session);

        if ($adminLogIn != false) {
            $result_delete = $this->container->newDeleteAdmin()->deleteAdmin($this->container);

            if ($result_delete == true) {
                $this->session->set('success', "Le compte administrateur a bien été supprimé.");
                $this->redirect('/admin/compte');
            } else {
                $this->session->set('error', "Une erreur est survenue: ".$result_delete);
                $this->redirect('/admin/blog-post');
            }
        } else {
            $this->session->delete('uuid');
            $this->redirect('/admin/login');
        }
    }
}
