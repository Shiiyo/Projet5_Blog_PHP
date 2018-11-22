<?php

namespace Controller;

class ListBlogPostController implements ControllerInterface
{
    use ControllerTrait;

    public function __invoke()
    {
        $view = $this->getTwig()->render('blog/blogHome.html.twig');
        $response = $this->getContainer()->newHttpResponseHtml($view);
        $response->send();
    }
}
