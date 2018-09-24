<?php

namespace framework\Interfaces;

interface RouteInterface
{
    public function __construct($controller, $path);

    //GETTERS
    public function getController();

    public function getPath();

    //SETTERS
    public function setController(string $controller);

    public function setPath(string $path);
}
