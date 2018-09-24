<?php

namespace framework;

class Route implements Interfaces\RouteInterface
{
    private $controller;
    private $path;

    public function __construct($controller, $path)
    {
        $this->setController($controller);
        $this->setPath($path);
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

    //SETTERS
    public function setController(string $controller): void
    {
        $this->controller = $controller;
    }

    public function setPath(string $path): void
    {
        $this->path = $path;
    }
}
