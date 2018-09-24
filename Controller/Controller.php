<?php

namespace Controller;

trait Controller
{
    protected $param;

    public function __construct($param)
    {
        $this->setParam($param);
    }

    //GETTERS
    public function getParam()
    {
        return $this->param;
    }

    //SETTERS
    public function setParam($param): void
    {
        $this->param = $param;
    }
}
