<?php


namespace Controller\Admin;

use Controller\ControllerInterface;
use Controller\ControllerTrait;

class UpdateBlogPostController implements ControllerInterface
{
    use ControllerTrait;

    public function __invoke()
    {
        $adminLogIn = $this->container->newTestAdminLogin()->testAdminLogin($this->container, $this->session);
        $token = $this->container->newTokenManagement()->generateToken($this->session);

        if ($adminLogIn != false) {
            $article = $this->container->newSearchArticle()->searchArticle($this->container);
            $adminCollection = $this->container->getAdminLoader($this->container)->getAdminCollection();

            $view = $this->getTwig()->render('admin/updateBlogPost.html.twig', ['article' => $article, 'adminCollection' => $adminCollection,
                                                                                        'token'=>$token]);
            $response = $this->getContainer()->newHttpResponseHtml($view);
            $response->send();
        } else {
            $this->session->delete('uuid');
            $this->redirect('/admin/login');
        }

        $this->container->newRefreshPopup()->refreshPopup($this->session);
    }
}
