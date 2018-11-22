<?php

namespace Controller;

class ListBlogPostController implements ControllerInterface
{
    use ControllerTrait;

    public function __invoke()
    {
        $articleLoader = $this->container->getArticleLoader($this->container);
        $articleCollection = $articleLoader->getArticleCollection();

        $view = $this->getTwig()->render('blog/blogHome.html.twig', array($articleCollection));
        $response = $this->getContainer()->newHttpResponseHtml($view);
        $response->send();
    }
}
