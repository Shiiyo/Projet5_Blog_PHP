<?php

namespace services;

use Twig\Environment;

class AppInit
{
    protected $container;

    public function __construct($container)
    {
        $this->container = $container;
    }

    /**
     * @return mixed
     */
    public function init()
    {
        $loader = $this->container->newTwigLoaderFilesystem($this->container->getParam('Twig/path'));
        $twig = $this->container->newTwigEnvironment($loader, [
            'debug' => true,
        ]);

        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $this->container->getTwigEnv()->addGlobal('session', $_SESSION);

        $router = $this->container->newRouter($this->container);
        $router->resolve();

        $controller = $router->loadController();
        $controller();

        return $twig;
    }
}
