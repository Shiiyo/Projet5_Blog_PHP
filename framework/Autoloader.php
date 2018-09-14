<?php

namespace framework;

class Autoloader
{
    //Enregistre notre autoloader
    public static function register()
    {
        spl_autoload_register(array(__CLASS__, 'autoload'));
    }

    //Inclue le fichier correspondant à notre classe
    public static function autoload($class)
    {
        require '..\\' . $class . '.php';
    }
}
