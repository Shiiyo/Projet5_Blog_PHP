<?php

namespace Controller\Admin;

use Controller\ControllerInterface;
use Controller\ControllerTrait;

class DeleteAdminAccountController implements ControllerInterface
{
    use ControllerTrait;

    public function __invoke()
    {
        $testAdminLogIn = $this->container->newTestAdminLogIn();
        $adminLogIn = $testAdminLogIn->testLogIn($this->session->get('uuid'), $this->container);

        if ($adminLogIn != false) {
            $idAdmin = $this->container->newEndParamURI()->getEndParamURI();
            $adminDeleter = $this->container->newAdminDeleter();
            $result_delete = $adminDeleter->delete($idAdmin);

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
