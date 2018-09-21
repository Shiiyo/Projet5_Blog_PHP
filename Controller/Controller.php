<?php

namespace Controller;

trait Controller
{
    protected $action;
    protected $parameters = [];

    //GETTERS
    public function getAction()
    {
        return $this->action;
    }
    public function getParameters(): array
    {
        return $this->parameters;
    }

    //SETTERS
    public function setAction($action): void
    {
        $this->action = $action;
    }

    public function setParameters(array $parameters): void
    {
        $this->parameters = $parameters;
    }
}