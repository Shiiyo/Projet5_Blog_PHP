<?php

require '../framework/Autoloader.php';
framework\Autoloader::register();

$router = new \framework\Router();
$router->resolve();

$controller = $router->loadController();
