<?php

namespace Controller;

interface ControllerInterface
{
    /**
     * Implement the right view
     * @return mixed
     */
    public function __invoke();

    /**
     * ControllerInterface constructor.
     * @param $param
     */
    public function __construct($param, $twigEnv);

    //GETTERS

    /**
     * @return mixed
     */
    public function getParam();

    /**
     * @return \Twig_Environment
     */
    public function getTwig() : \Twig_Environment;

    //SETTERS

    /**
     * @param $param
     */
    public function setParam($param): void;

    /**
     * @param \Twig_Environment $twigEnv
     */
    public function setTwig(\Twig_Environment $twigEnv): void;
}
