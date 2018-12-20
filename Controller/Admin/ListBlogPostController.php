<?php

namespace Controller\Admin;

use Controller\ControllerInterface;
use Controller\ControllerTrait;

class ListBlogPostController implements ControllerInterface
{
    use ControllerTrait;

    public function __invoke()
    {
        $testAdminLogIn = $this->container->newTestAdminLogIn();
        $adminLogIn = $testAdminLogIn->testLogIn($this->session->get('uuid'), $this->container);
        if ($adminLogIn != false) {
            $articleLoader = $this->container->getArticleLoader($this->container);
            $articleCollection = $articleLoader->getArticleCollection();

            $commentLoader = $this->container->getCommentLoader($this->container);
            $commentLoader->setNbCommentForArticleCollection($articleCollection);

            $adminLoader = $this->container->getAdminLoader($this->container);
            $adminLoader->setAdminNameForArticleCollection($articleCollection);

            $view = $this->getTwig()->render('admin/blogPostList.html.twig', ['articleCollection' => $articleCollection]);
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
