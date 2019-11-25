<?php

namespace Controller\Admin;

use Controller\ControllerInterface;
use Controller\ControllerTrait;

class AddBlogPostController implements ControllerInterface
{
    use ControllerTrait;

    public function __invoke()
    {
        $adminLogIn = $this->container->newTestAdminLogin()->testAdminLogin($this->container, $this->session);

        if ($adminLogIn != false) {
            $view = $this->getTwig()->render('admin/addBlogPost.html.twig', ['id_admin' => $this->session->get('uuid')]);
            $response = $this->getContainer()->newHttpResponseHtml($view);
            $response->send();
        } else {
            $this->session->delete('uuid');
            $this->redirect('/admin/login');
        }

        $this->container->newRefreshPopup()->refreshPopup($this->session);
    }
}
