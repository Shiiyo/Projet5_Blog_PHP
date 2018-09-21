<?php

namespace framework\Interfaces;


interface RouteInterface
{
    //GETTERS
    public function getController();

    public function getPath();

    public function getAction();

    //SETTERS
    public function setController(string $controller);

    public function setPath(string $path);

    public function setAction($action);
}