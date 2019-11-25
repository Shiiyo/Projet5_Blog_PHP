<?php

namespace Controller;

use services\EndParamURI;

class BlogPostController implements ControllerInterface
{
    use ControllerTrait;

    public function __invoke()
    {
        $article = $this->container->newSearchArticle()->searchArticle($this->container);
        $admin = $this->container->newSearchAdmin()->searchAdmin($this->container, $article);
        $commentCollection = $this->container->newSearchComment()->searchCommentCollection($this->container, $article);
        $nbComment = $this->container->getCommentLoader($this->container)->getNbCommentForOneArticle($article);

        $view = $this->getTwig()->render('blog/article.html.twig', ['article' => $article,
                                                                            'admin' => $admin,
                                                                            'commentCollection' => $commentCollection,
                                                                            'nbComment' => $nbComment]);
        $response = $this->getContainer()->newHttpResponseHtml($view);
        $response->send();

        $this->container->newRefreshPopup()->refreshPopup($this->session);
    }
}
