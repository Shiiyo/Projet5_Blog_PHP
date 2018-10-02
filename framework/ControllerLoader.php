<?php

namespace framework;

class ControllerLoader
{
    public function load(Router $router)
    {
        if (preg_match('#/admin/#', $router->getRoute()->getPath())) {
            $controllerPath = 'Controller\\Admin\\'.$router->getRoute()->getController().'Controller';
        } else {
            $controllerPath = 'Controller\\'.$router->getRoute()->getController().'Controller';
        }
        return $controllerPath;
    }
}
