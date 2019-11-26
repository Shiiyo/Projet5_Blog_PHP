<?php

namespace Controller;

class Page404Controller implements ControllerInterface
{
    use ControllerTrait;

    /**
     * Implement the right view
     */
    public function __invoke()
    {
        $view = $this->getTwig()->render('404.html.twig');
        $response = $this->getContainer()->newHttpResponseHtml($view);
        $response->send();
    }
}
