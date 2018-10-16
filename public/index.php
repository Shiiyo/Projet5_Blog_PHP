<?php

require '../framework/Autoloader.php';
require '../vendor/autoload.php';
framework\Autoloader::register();

$configXML = simplexml_load_file('../framework/config.xml');
foreach ($configXML as $param) {
    $parameters[] = $param;
}

if (isset($parameters)) {
    $container = new \framework\DependencyInjectionContainer($parameters);
}

$loader = $container->newTwigLoaderFilesystem('../templates');
$container->newTwigEnvironment($loader, []);

$router = $container->newRouter($container);
$router->resolve();

$controller = $router->loadController();
$controller->index();
