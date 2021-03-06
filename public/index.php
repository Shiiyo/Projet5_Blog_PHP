<?php

require '../vendor/autoload.php';

$configXML = simplexml_load_file('../config/config.xml');

if (isset($configXML)) {
    $container = new \framework\DependencyInjectionContainer($configXML);
}

$twig = $container->newAppInit($container)->init();
