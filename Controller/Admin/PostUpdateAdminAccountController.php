<?php

namespace Controller\Admin;

use Controller\ControllerInterface;
use Controller\ControllerTrait;
use Ramsey\Uuid\Uuid;

class PostUpdateAdminAccountController implements ControllerInterface
{
    use ControllerTrait;

    public function __invoke()
    {
        $adminLogIn = $this->container->newCheckAdminLogin()->checkAdminLogin($this->container, $this->session);

        if ($adminLogIn != false) {
            $request = $this->getContainer()->newHttpRequest();
            $error_msg = $this->container->newPostUpdateAdminCheckFields()->postUpdateAdminCheckFields($this->container, $request, $this->session);

            if ($error_msg == "") {
                $returnUpdate = $this->container->getAdminWriter($this->container)->update($request);
                if ($returnUpdate == true) {
                    $this->session->set('success', "L'administateur a bien été mis à jour.");
                    $this->redirect('/admin/compte');
                } else {
                    $this->session->set('error', $returnUpdate);
                    $this->redirect('/admin/compte');
                }
            } else {
                $this->session->set('error', $error_msg);
                $this->redirect('/admin/compte');
            }
        } else {
            $this->session->delete('uuid');
            $this->redirect('/admin/login');
        }
    }
}
