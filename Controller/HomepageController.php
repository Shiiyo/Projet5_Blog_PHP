<?php

namespace Controller;

class HomepageController implements ControllerInterface
{
    use ControllerTrait;

    public function __invoke()
    {
        $view = $this->getTwig()->render('blog/home.html.twig');
        $response = $this->getContainer()->newHttpResponseHtml($view);
        $response->send();
    }
}
