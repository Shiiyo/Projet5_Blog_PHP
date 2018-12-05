<?php

namespace Controller;

use framework\DependencyInjectionContainer;
use framework\Session\SessionInterface;

trait ControllerTrait
{
    protected $param;
    protected $twig;
    protected $container;
    protected $session;

    /**
     * ControllerTrait constructor.
     * @param $param
     * @param $twigEnv
     * @param DependencyInjectionContainer $container
     */
    public function __construct($param, $twigEnv, $container)
    {
        $this->setParam($param);
        $this->setTwig($twigEnv);
        $this->setContainer($container);
        $this->setSession($container->newPHPSession());
    }

    /**
     * @param string $url
     */
    public function redirect($url)
    {
        header('Location: '.$url);
    }

    //GETTERS

    /**
     * @return mixed
     */
    public function getParam()
    {
        return $this->param;
    }

    /**
     * @return \Twig_Environment
     */
    public function getTwig() : \Twig_Environment
    {
        return $this->twig;
    }

    /**
     * @return \framework\DependencyInjectionContainer
     */
    public function getContainer() :\framework\DependencyInjectionContainer
    {
        return $this->container;
    }




    //SETTERS

    /**
     * @param $param
     */
    public function setParam($param): void
    {
        $this->param = $param;
    }

    /**
     * @param \Twig_Environment $twigEnv
     */
    public function setTwig(\Twig_Environment $twigEnv): void
    {
        $this->twig = $twigEnv;
    }

    /**
     * @param \framework\DependencyInjectionContainer $container
     */
    public function setContainer($container): void
    {
        $this->container = $container;
    }

    /**
     * @param SessionInterface $session
     */
    public function setSession($session): void
    {
        $this->session = $session;
    }
}
