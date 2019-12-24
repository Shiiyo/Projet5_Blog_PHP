<?php

namespace Controller\Admin;

use Controller\ControllerTrait;
use Controller\ControllerInterface;

class BlogPostController implements ControllerInterface
{
    use ControllerTrait;

    public function __invoke()
    {
        if ($this->session->get('uuid')!= null) {
            $adminLogIn = $this->container->newCheckAdminLogin()->checkAdminLogin($this->container, $this->session);

            if ($adminLogIn == false) {
                $this->session->delete('uuid');
                $this->redirect('/admin/login');
            } else {
                $view = $this->getTwig()->render('admin/blogPostList.html.twig', ['admin' => $adminLogIn]);
                $response = $this->getContainer()->newHttpResponseHtml($view);
                $response->send();
            }
        } else {
            $this->redirect('/admin/login');
        }
    }
}
