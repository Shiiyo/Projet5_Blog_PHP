<?php


namespace Controller\Admin;

use Controller\ControllerInterface;
use Controller\ControllerTrait;

class UpdateBlogPostController implements ControllerInterface
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

            $adminLoader = $this->container->getAdminLoader($this->container);
            $adminCollection = $adminLoader->getAdminCollection();

            $view = $this->getTwig()->render('admin/updateBlogPost.html.twig', ['article' => $article, 'adminCollection' => $adminCollection]);
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
