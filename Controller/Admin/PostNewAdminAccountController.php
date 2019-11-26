<?php


namespace Controller\Admin;

use Controller\ControllerInterface;
use Controller\ControllerTrait;

class PostNewAdminAccountController implements ControllerInterface
{
    use ControllerTrait;

    public function __invoke()
    {
        $adminLogIn = $this->container->newTestAdminLogin()->testAdminLogin($this->container, $this->session);

        if ($adminLogIn != false) {
            $request = $this->getContainer()->newHttpRequest();
            $error_msg = $this->container->newPostNewAdminAccountTestingFields()->postNewAdminAccountTestingFields($this->container, $request, $this->session);

            if ($error_msg == "") {
                //Test if the pseudo is already save in DB or not
                $existingPseudo = $this->container->getAdminTestExistingPseudo($this->container)->testExistingPseudo($request->get('pseudo'));

                if ($existingPseudo) {
                    $this->session->set('error', "Le pseudo existe déjà.");
                    $this->redirect('/admin/ajouter-admin');
                } else {
                    $this->container->getAdminWriter($this->container)->write($request);

                    $this->session->set('success', "L'administateur est enregistré");
                    $this->redirect('/admin/compte');
                }
            } else {
                $this->session->set('error', $error_msg);
                $this->redirect('/admin/ajouter-admin');
            }
        } else {
            $this->session->delete('uuid');
            $this->redirect('/admin/login');
        }
    }
}
