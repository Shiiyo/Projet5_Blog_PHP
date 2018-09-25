<?php

namespace framework;

use Controller\ControllerInterface;
use framework\Interfaces\RouteInterface;

class Router implements Interfaces\RouterInterface
{
    /**
     * @var RouteInterface
     */
    private $route;
    private $param;

    /**
     * Get the url and resolve which route is the good one
     */
    public function resolve() : void
    {
        $routingResolver = new UrlRoutingResolver($_SERVER['REQUEST_URI']);
        $routingResolver->findRoute();
        $this->setRoute($routingResolver->getRoute());
        $this->setParam($routingResolver->getParam());
    }

    /**
     * Create and return the good controller and save the param ask in the URL
     * @return ControllerInterface
     */
    public function loadController() : ControllerInterface
    {
        if (preg_match('#/admin/#', $this->route->getPath())) {
            $controllerPath = 'Controller\\Admin\\'.$this->route->getController().'Controller';
        } else {
            $controllerPath = 'Controller\\'.$this->route->getController().'Controller';
        }
        return new $controllerPath($this->getParam());
    }

    //GETTERS
    /**
     * @return RouteInterface
     */
    public function getRoute() : RouteInterface
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
    public function setRoute(RouteInterface $route): void
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
