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

        $view = $this->getTwig()->render('blog/article.html.twig', ['article' => $article]);
        $response = $this->getContainer()->newHttpResponseHtml($view);
        $response->send();
    }
}
