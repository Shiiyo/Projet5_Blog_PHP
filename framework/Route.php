<?php

namespace framework;

class Route implements Interfaces\RouteInterface
{
    private $controller;
    private $path;
    private $action = NULL;

    public function __construct($controller, $path, $action=NULL)
    {
        $this->setController($controller);
        $this->setPath($path);
        $this->setAction($action);
    }

    //GETTERS
    public function getController()
    {
        return $this->controller;
    }

    public function getPath()
    {
        return $this->path;
    }

    public function getAction()
    {
        return $this->action;
    }

    //SETTERS
    public function setController(string $controller): void
    {
        $this->controller = $controller;
    }

    public function setPath(string $path): void
    {
        $this->path = $path;
    }

    public function setAction($action): void
    {
        $this->action = $action;
    }
}
