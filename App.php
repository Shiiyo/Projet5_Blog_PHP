<?php
/**
 * Created by PhpStorm.
 * User: saysa
 * Date: 13.09.18
 * Time: 16:05
 */

class App
{
    private $router;

    public function __construct()
    {
        $this->router = new \framework\Router();
    }

    public function run()
    {
        $this->router->resolve();
    }
}