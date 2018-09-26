<?php

namespace framework;

class Autoloader
{

    /**
     * Save our autoloader
     */
    public static function register()
    {
        spl_autoload_register(array(__CLASS__, 'autoload'));
    }


    /**
     * Include the file of the class we ask
     * @param $class
     */
    public static function autoload($class)
    {
        $path = '..\\' . $class . '.php';
        $path = str_replace('\\', '/', $path);
        if (file_exists($path)) {
            require $path;
        }
    }
}
