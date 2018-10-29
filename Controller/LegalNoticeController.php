<?php

namespace Controller;

class LegalNoticeController implements ControllerInterface
{
    use ControllerTrait;

    /**
     * Implement the right view
     */
    public function __invoke()
    {
        $twig = $this->getTwig();
        echo $twig->render('blog/legalNotice.html.twig');
    }
}