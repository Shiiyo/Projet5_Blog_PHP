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
            $view = $this->getTwig()->render('admin/blogPostList.html.twig', ['articleCollection' => $articleCollection]);
            $response = $this->getContainer()->newHttpResponseHtml($view);
            $response->send();
        } else {
            $this->session->delete('uuid');
            $this->redirect('/admin/login');
        }
    }
}
