<?php

namespace Controller;

trait ControllerTrait
{
    protected $param;
    protected $twig;

    /**
     * ControllerTrait constructor.
     * @param $param
     * @param $twigEnv
     */
    public function __construct($param, $twigEnv)
    {
        $this->setParam($param);
        $this->setTwig($twigEnv);
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
}
