<?php

// FrontController: instancie le routeur
require 'framework/Autoloader.php';
$autoload = new \framework\Autoloader;
$autoload::register();

$app = new App;
$app->run();