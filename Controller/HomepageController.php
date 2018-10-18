<?php

namespace Controller;

class HomepageController implements ControllerInterface
{
    use ControllerTrait;

    /**
     * Implement the right view
     */
    public function __invoke()
    {
        $twig = $this->getTwig();
        echo $twig->render('blog/home.html.twig');
    }
}
