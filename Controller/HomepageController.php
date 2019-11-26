<?php

namespace Controller;

class HomepageController implements ControllerInterface
{
    use ControllerTrait;

    public function __invoke()
    {
        $token = $this->container->newTokenManagement()->generateToken($this->session);
        $view = $this->getTwig()->render('blog/home.html.twig', ['token'=>$token]);
        $response = $this->getContainer()->newHttpResponseHtml($view);
        $response->send();

        $this->container->newRefreshPopup()->refreshPopup($this->session);
    }
}
