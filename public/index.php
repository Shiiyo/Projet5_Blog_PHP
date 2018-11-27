<?php

require '../framework/Autoloader.php';
require '../vendor/autoload.php';
framework\Autoloader::register();

$configXML = simplexml_load_file('../framework/config/config.xml');

if (isset($configXML)) {
    $container = new \framework\DependencyInjectionContainer($configXML);
}

$loader = $container->newTwigLoaderFilesystem($container->getParam('Twig/path'));
$twig = $container->newTwigEnvironment($loader, [
    'debug' => true,
]);

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$container->getTwigEnv()->addGlobal('session', $_SESSION);

$router = $container->newRouter($container);
$router->resolve();

$controller = $router->loadController();
$controller();
