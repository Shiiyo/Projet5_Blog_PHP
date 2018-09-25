<?php

namespace framework;

class Router implements Interfaces\RouterInterface
{
    private $route;
    private $param;

    /**
     * Get the url and resolve which route is the good one
     */
    public function resolve()
    {
        $url = $_SERVER['REQUEST_URI'];
        $routingResolver = new UrlRoutingResolver($url);
        $routeFindAndParam = $routingResolver->findRoute();
        $route = $routeFindAndParam[0];
        $this->setRoute($route);
        $param = $routeFindAndParam[1];
        $this->setParam($param);
    }

    /**
     * Create and return the good controller and save the param ask in the URL
     * @return mixed
     */
    public function loadController()
    {
        $route = $this->getRoute();
        $path = $route->getPath();
        $controllerName = $route->getController();
        if (preg_match('#/admin/#', $path)) {
            $controllerPath = 'Controller\\Admin\\'.$controllerName.'Controller';
        } else {
            $controllerPath = 'Controller\\'.$controllerName.'Controller';
        }
        $controller = new $controllerPath($this->getParam());
        return $controller;
    }

    //GETTERS
    /**
     * @return mixed
     */
    public function getRoute()
    {
        return $this->route;
    }

    /**
     * @return mixed
     */
    public function getParam()
    {
        return $this->param;
    }

    //SETTERS

    /**
     * @param $route
     */
    public function setRoute($route): void
    {
        $this->route = $route;
    }

    /**
     * @param $param
     */
    public function setParam($param): void
    {
        $this->param = $param;
    }
}
