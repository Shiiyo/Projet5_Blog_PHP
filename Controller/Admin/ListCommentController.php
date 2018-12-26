<?php


namespace Controller\Admin;

use Controller\ControllerInterface;
use Controller\ControllerTrait;

class ListCommentController implements ControllerInterface
{
    use ControllerTrait;

    public function __invoke()
    {
        $testAdminLogIn = $this->container->newTestAdminLogIn();
        $adminLogIn = $testAdminLogIn->testLogIn($this->session->get('uuid'), $this->container);

        if ($adminLogIn != false) {
            $commentLoader = $this->container->getCommentLoader($this->container);
            $commentCollection = $commentLoader->getCommentCollection();

            $articleLoader = $this->container->getArticleLoader($this->container);
            $articleLoader->setArticleNameForCommentCollection($commentCollection);

            $view = $this->getTwig()->render('admin/commentList.html.twig', ['commentCollection' => $commentCollection]);
            $response = $this->getContainer()->newHttpResponseHtml($view);
            $response->send();
        } else {
            $this->session->delete('uuid');
            $this->redirect('/admin/login');
        }

        if ($this->session->get('success')!= null) {
            $this->session->delete('success');
        } elseif ($this->session->get('error')!= null) {
            $this->session->delete('error');
        }
    }
}
