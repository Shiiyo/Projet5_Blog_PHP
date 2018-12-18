<?php

namespace Controller\Admin;

use Controller\ControllerInterface;
use Controller\ControllerTrait;

class AddBlogPostController implements ControllerInterface
{
    use ControllerTrait;

    public function __invoke()
    {
        $testAdminLogIn = $this->container->newTestAdminLogIn();
        $adminLogIn = $testAdminLogIn->testLogIn($this->session->get('uuid'), $this->container);

        if ($adminLogIn != false) {
            $view = $this->getTwig()->render('admin/addBlogPost.html.twig');
            $response = $this->getContainer()->newHttpResponseHtml($view);
            $response->send();
        } else {
            $this->session->delete('uuid');
            $this->redirect('/admin/login');
        }
    }
}
