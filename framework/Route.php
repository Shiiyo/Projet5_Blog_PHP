<?php

namespace framework;

class Route implements Interfaces\RouteInterface
{
    private $controller;
    private $path;

    /**
     * Route constructor.
     * @param $controller
     * @param $path
     */
    public function __construct($controller, $path)
    {
        $this->setController($controller);
        $this->setPath($path);
    }

    //GETTERS

    /**
     * @return mixed
     */
    public function getController()
    {
        return $this->controller;
    }

    /**
     * @return mixed
     */
    public function getPath()
    {
        return $this->path;
    }

    //SETTERS

    /**
     * @param string $controller
     */
    public function setController(string $controller): void
    {
        $this->controller = $controller;
    }

    /**
     * @param string $path
     */
    public function setPath(string $path): void
    {
        $this->path = $path;
    }
}
