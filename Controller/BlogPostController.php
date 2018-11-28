<?php

namespace Controller;

use services\IdArticleFromURI;

class BlogPostController implements ControllerInterface
{
    use ControllerTrait;

    public function __invoke()
    {
        $idArticle = $this->container->newIdArticleFromURI()->getIdArticleFromURI();
        $articleLoader = $this->container->getArticleLoader($this->container);
        $article = $articleLoader->findOneById($idArticle);

        $adminLoader = $this->container->getAdminLoader($this->container);
        $admin = $adminLoader->findOneById($article->getIdAdmin());

        $view = $this->getTwig()->render('blog/article.html.twig', ['article' => $article, 'admin' => $admin]);
        $response = $this->getContainer()->newHttpResponseHtml($view);
        $response->send();
    }
}
