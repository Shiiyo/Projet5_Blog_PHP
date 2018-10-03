<?php

namespace Controller;

trait ControllerTrait
{
    protected $param;

    /**
     * ControllerTrait constructor.
     * @param $param
     */
    public function __construct($param)
    {
        $this->setParam($param);
    }

    //GETTERS

    /**
     * @return mixed
     */
    public function getParam()
    {
        return $this->param;
    }

    //SETTERS

    /**
     * @param $param
     */
    public function setParam($param): void
    {
        $this->param = $param;
    }
}
