<?php

namespace Controller\Admin;

use Controller\ControllerInterface;
use Controller\ControllerTrait;

class ListBlogPostController implements ControllerInterface
{
    use ControllerTrait;

    public function __invoke()
    {
        $adminLogIn = $this->container->newTestAdminLogin()->testAdminLogin($this->container, $this->session);

        if ($adminLogIn != false) {
            $articleCollection = $this->container->newSearchArticleCollection()->searchArticleCollection($this->container);

            $view = $this->getTwig()->render('admin/blogPostList.html.twig', ['articleCollection' => $articleCollection]);
            $response = $this->getContainer()->newHttpResponseHtml($view);
            $response->send();
        } else {
            $this->session->delete('uuid');
            $this->redirect('/admin/login');
        }

        $this->container->newRefreshPopup()->refreshPopup($this->session);
    }
}
