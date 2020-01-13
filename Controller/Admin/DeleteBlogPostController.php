<?php

namespace Controller\Admin;

use Controller\ControllerInterface;
use Controller\ControllerTrait;

class DeleteBlogPostController implements ControllerInterface
{
    use ControllerTrait;

    public function __invoke()
    {
        $adminLogIn = $this->container->newCheckAdminLogin()->checkAdminLogin($this->container, $this->session);

        if ($adminLogIn != false) {
            $article = $this->container->newSearchArticle()->searchArticle($this->container);
            $deleteStatus = $this->container->newArticleDeleter()->delete($article);
            if ($deleteStatus === true) {
                $this->session->set('success', "L'article a bien été supprimé.");
                $this->redirect('/admin/blog-post');
            } else {
                $this->session->set('error', $deleteStatus);
                $this->redirect('/admin/blog-post');
            }
        } else {
            $this->session->delete('uuid');
            $this->redirect('/admin/login');
        }
    }
}
