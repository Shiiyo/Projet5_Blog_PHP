<?php

require '../framework/Autoloader.php';
require '../vendor/autoload.php';
framework\Autoloader::register();

$configXML = simplexml_load_file('../framework/config/config.xml');
foreach ($configXML as $param) {
    $parameters[] = $param;
}

if (isset($parameters)) {
    $container = new \framework\DependencyInjectionContainer($parameters);
}

$loader = $container->newTwigLoaderFilesystem($container->getParam(0));
$container->newTwigEnvironment($loader, []);

$router = $container->newRouter($container);
$router->resolve();

$controller = $router->loadController();
$controller();
