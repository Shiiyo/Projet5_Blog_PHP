<?php


namespace Controller\Admin;

use Controller\ControllerInterface;
use Controller\ControllerTrait;

class OnlineCommentController implements ControllerInterface
{
    use ControllerTrait;

    public function __invoke()
    {
        $testAdminLogIn = $this->container->newTestAdminLogIn();
        $adminLogIn = $testAdminLogIn->testLogIn($this->session->get('uuid'), $this->container);

        if ($adminLogIn != false) {
            $idComment = $this->container->newEndParamURI()->getEndParamURI();
            $commentBuilder = $this->container->getCommentWriter($this->container);
            $resultUpdate = $commentBuilder->accepted($idComment);

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
