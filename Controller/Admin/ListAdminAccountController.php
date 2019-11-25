<?php


namespace Controller\Admin;

use Controller\ControllerInterface;
use Controller\ControllerTrait;

class ListAdminAccountController implements ControllerInterface
{
    use ControllerTrait;

    public function __invoke()
    {
        $adminLogIn = $this->container->newTestAdminLogin()->testAdminLogin($this->container, $this->session);

        if ($adminLogIn != false) {
            $adminCollection = $this->container->getAdminLoader($this->container)->getAdminCollection();
            $this->container->getArticleLoader($this->container)->setNbArticlesByAdmin($adminCollection);

            $view = $this->getTwig()->render('admin/adminList.html.twig', ['adminCollection' => $adminCollection]);
            $response = $this->getContainer()->newHttpResponseHtml($view);
            $response->send();
        } else {
            $this->session->delete('uuid');
            $this->redirect('/admin/login');
        }

        $this->container->newRefreshPopup()->refreshPopup($this->session);
    }
}
