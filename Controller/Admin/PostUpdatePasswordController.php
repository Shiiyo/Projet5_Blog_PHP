<?php

namespace Controller\Admin;

use Controller\ControllerInterface;
use Controller\ControllerTrait;

class PostUpdatePasswordController implements ControllerInterface
{
    use ControllerTrait;
    public function __invoke()
    {
        $adminLogIn = $this->container->newCheckAdminLogin()->checkAdminLogin($this->container, $this->session);

        if ($adminLogIn != false) {
            $request = $this->getContainer()->newHttpRequest();
            $oldPassword = $request->request->get('oldPass');
            $adminId = $request->request->get('id_admin');

            if (password_verify($oldPassword, $this->container->getAdminLoader($this->container)->getPassword($adminId)['password']) == true) {
                $error_msg = $this->container->newPostUpdatePasswordCheckFields()->postUpdatePasswordCheckFields($this->container, $request, $this->session);

                if ($error_msg == "") {
                    $returnUpdate = $this->container->getAdminWriter($this->container)->passwordUpdate($request);
                    if ($returnUpdate == true) {
                        $this->session->set('success', "Le mot de passe a bien été mis à jour.");
                        $this->redirect('/admin/compte');
                    } else {
                        $this->session->set('error', $returnUpdate);
                        $this->redirect('\'/admin/compte/change-password/\'.$request->request->get(\'id_admin\')');
                    }
                } else {
                    $this->session->set('error', $error_msg);
                    $this->redirect('/admin/compte/change-password/'.$request->request->get('id_admin'));
                }
            } else {
                $this->session->set('error', "L'ancien mot de passe n'est pas correct.");
                $this->redirect('/admin/compte/change-password/'.$request->request->get('id_admin'));
            }
        }
        $this->session->delete('uuid');
        $this->redirect('/admin/login');
    }
}
