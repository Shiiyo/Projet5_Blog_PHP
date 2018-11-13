<?php

namespace Controller;

trait ControllerTrait
{
    protected $param;
    protected $twig;
    protected $container;

    /**
     * ControllerTrait constructor.
     * @param $param
     * @param $twigEnv
     * @param $container
     */
    public function __construct($param, $twigEnv, $container)
    {
        $this->setParam($param);
        $this->setTwig($twigEnv);
        $this->setContainer($container);
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
}
