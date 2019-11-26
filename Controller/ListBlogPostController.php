<?php

namespace Controller;

class ListBlogPostController implements ControllerInterface
{
    use ControllerTrait;

    public function __invoke()
    {
        $articleCollection = $this->container->getArticleLoader($this->container)->getArticleCollection();

        $view = $this->getTwig()->render('blog/blogHome.html.twig', ['articleCollection' => $articleCollection]);
        $response = $this->getContainer()->newHttpResponseHtml($view);
        $response->send();
    }
}
