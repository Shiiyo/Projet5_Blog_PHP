<?php
// FrontController: instancie le routeur

require 'framework\Autoloader.php';
$autoload = new \framework\Autoloader;
$autoload::register();


$router = new \framework\Router();