<?php

namespace Controller;

interface ControllerInterface
{
    /**
     * Implement the right view
     * @return mixed
     */
    public function index();

    /**
     * ControllerInterface constructor.
     * @param $param
     */
    public function __construct($param);

    //GETTERS

    /**
     * @return mixed
     */
    public function getParam();

    //SETTERS

    /**
     * @param $param
     */
    public function setParam($param): void;
}
