<?php

namespace framework\Interfaces;

interface RouterInterface
{
    public function resolve(); //Get the url and resolve which route is the good one
    public function loadController(); //Create and return the good controller and the action to do

    //GETTERS
    public function getRoute();
    public function getParam();

    //SETTERS
    public function setRoute(RouteInterface $route): void;
    public function setParam($param): void;
}
