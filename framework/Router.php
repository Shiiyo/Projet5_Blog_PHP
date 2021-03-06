<?php

namespace framework;

use Controller\ControllerInterface;
use framework\Interfaces\RouteInterface;

class Router implements Interfaces\RouterInterface
{
    use ContainerInjectionTrait;

    /**
     * @var RouteInterface
     */
    private $route;
    private $param;

    /**
     * Get the url and resolve which route is the good one
     */
    public function resolve():void
    {
        $routingResolver = $this->getContainer()->newUrlRoutingResolver($this->getContainer(), $_SERVER['REQUEST_URI']);
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
        $controllerLoader = $this->getContainer()->newControllerLoader();
        $controllerPath = $controllerLoader->load($this);
        return $this->getContainer()->newController($controllerPath, $this->getParam(), $this->getContainer());
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
