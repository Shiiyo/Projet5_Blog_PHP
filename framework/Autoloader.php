<?php

namespace framework;

class Autoloader
{
    //Enregistre notre autoloader
    static function register()
    {
        spl_autoload_register(array(__CLASS__, 'autoload'));
    }

    //Inclue le fichier correspondant à notre classe
    static function autoload($class)
    {

        require str_replace('\\', '/', $class) . '.php';
    }
}