<?php

namespace Controller;

trait Controller
{
    protected $param;

    /**
     * Controller constructor.
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
