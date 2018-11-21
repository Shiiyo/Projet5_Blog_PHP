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

        if ($this->session->get('success')!= null) {
            $this->session->delete('success');
        } elseif ($this->session->get('error')!= null) {
            $this->session->delete('error');
        }
    }
}
