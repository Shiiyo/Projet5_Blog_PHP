<?php

namespace framework\Interfaces;


interface RouterInterface
{
    //GETTERS
    public function getRoute();

    //SETTERS
    public function setRoute($route): void;
}