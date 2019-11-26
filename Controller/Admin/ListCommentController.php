<?php


namespace Controller\Admin;

use Controller\ControllerInterface;
use Controller\ControllerTrait;

class ListCommentController implements ControllerInterface
{
    use ControllerTrait;

    public function __invoke()
    {
        $adminLogIn = $this->container->newTestAdminLogin()->testAdminLogin($this->container, $this->session);

        if ($adminLogIn != false) {
            $commentCollection = $this->container->getCommentLoader($this->container)->getCommentCollection();
            $this->container->getArticleLoader($this->container)->setArticleNameForCommentCollection($commentCollection);

            $view = $this->getTwig()->render('admin/commentList.html.twig', ['commentCollection' => $commentCollection]);
            $response = $this->getContainer()->newHttpResponseHtml($view);
            $response->send();
        } else {
            $this->session->delete('uuid');
            $this->redirect('/admin/login');
        }

        $this->container->newRefreshPopup()->refreshPopup($this->session);
    }
}
