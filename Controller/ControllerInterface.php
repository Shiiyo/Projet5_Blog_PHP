<?php

namespace Controller;

interface ControllerInterface
{
    public function index();

    public function __construct($param);

    //GETTERS
    public function getParam();

    //SETTERS
    public function setParam($param): void;
}
