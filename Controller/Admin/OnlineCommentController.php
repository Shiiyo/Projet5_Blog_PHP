<?php


namespace Controller\Admin;

use Controller\ControllerInterface;
use Controller\ControllerTrait;

class OnlineCommentController implements ControllerInterface
{
    use ControllerTrait;

    public function __invoke()
    {
        $adminLogIn = $this->container->newCheckAdminLogin()->checkAdminLogin($this->container, $this->session);

        if ($adminLogIn != false) {
            $resultUpdate = $this->container->newPutOnlineComment()->putOnlineComment($this->container);

            if ($resultUpdate == true) {
                $this->session->set('success', "Le commentaire a bien été accepté");
            } else {
                $this->session->set('error', "Le commentaire n'a pas put être accepté. Message d'erreur: " . $resultUpdate);
            }
            $this->redirect('/admin/comment');
        } else {
            $this->session->delete('uuid');
            $this->redirect('/admin/login');
        }
    }
}
