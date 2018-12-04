<?php

namespace Controller;

use services\ArticleFromURI;

class BlogPostController implements ControllerInterface
{
    use ControllerTrait;

    public function __invoke()
    {
        $slugArticle = $this->container->newArticleFromURI()->getArticleFromURI();
        $articleLoader = $this->container->getArticleLoader($this->container);
        $article = $articleLoader->findOneBySlug($slugArticle);

        $adminLoader = $this->container->getAdminLoader($this->container);
        $admin = $adminLoader->findOneById($article->getIdAdmin());

        $commentLoader = $this->container->getCommentLoader($this->container);
        $commentCollection = $commentLoader->getCommentCollectionForOneArticle($article->getId());

        $nbComment = $commentLoader->getNbCommentForOneArticle($article->getId());

        $view = $this->getTwig()->render('blog/article.html.twig', ['article' => $article,
                                                                            'admin' => $admin,
                                                                            'commentCollection' => $commentCollection,
                                                                            'nbComment' => $nbComment]);
        $response = $this->getContainer()->newHttpResponseHtml($view);
        $response->send();
    }
}
