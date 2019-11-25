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
        $view = $this->getTwig()->render('blog/legalNotice.html.twig');
        $response = $this->getContainer()->newHttpResponseHtml($view);
        $response->send();
    }
}
