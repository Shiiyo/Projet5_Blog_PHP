<?php

require '../framework/Autoloader.php';
framework\Autoloader::register();

$configXML = simplexml_load_file('../framework/config.xml');
foreach ($configXML as $param) {
    $parameters[] = $param;
}

$container = new \framework\DependencyInjectionContainer($parameters);

$router = $container->newRouter($container);
$router->resolve();

$controller = $router->loadController();
