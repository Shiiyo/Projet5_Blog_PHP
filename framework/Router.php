<?php

namespace framework;

class Router implements Interfaces\RouterInterface
{
    private $route;

    public function __construct()
    {
    }

    //Get the url and resolve which route is the good one
    public function resolve()
    {
        $url = $_SERVER['REQUEST_URI'];
        $routingResolver = new UrlRoutingResolver($url);
        $routeFind = $routingResolver->findRoute();
        $this->setRoute($routeFind);
    }

    //Create and return the good controller and the action to do
    public function loadController()
    {
        $route = $this->getRoute();
        $path = $route->getPath();
        $controller = $route->getController();
        if(preg_match('#/admin/#', $path))
        {
            $controllerPath = 'Controller\\Admin\\'.$controller.'Controller';
        }
        else
        {
            $controllerPath = 'Controller\\'.$controller.'Controller';
        }
        return $controllerPath;
    }

    //GETTERS
    public function getRoute()
    {
        return $this->route;
    }

    //SETTERS
    public function setRoute($route): void
    {
        $this->route = $route;
    }
}
