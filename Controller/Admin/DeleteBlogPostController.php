<?php

namespace Controller\Admin;

use Controller\ControllerInterface;
use Controller\ControllerTrait;

class DeleteBlogPostController implements ControllerInterface
{
    use ControllerTrait;

    public function __invoke()
    {
        $testAdminLogIn = $this->container->newTestAdminLogIn();
        $adminLogIn = $testAdminLogIn->testLogIn($this->session->get('uuid'), $this->container);

        if ($adminLogIn != false) {
            $slugArticle = $this->container->newEndParamURI()->getEndParamURI();
            $articleLoader = $this->container->getArticleLoader($this->container);
            $article = $articleLoader->findOneBySlug($slugArticle);


            $articleDeleter = $this->container->newArticleDeleter();
            $deleteStatus = $articleDeleter->delete($article);
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
