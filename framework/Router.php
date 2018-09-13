<?php

namespace framework;

class Router
{
    private $routes = [
        'contact' => 'Controller\BlogController',
        'home' => [
            'controller' => 'HomeController',
        ],
    ];
    private $request_uri;

    public function __construct()
    {
        $this->request_uri = substr($_SERVER['REQUEST_URI'], strpos($_SERVER['REQUEST_URI'], "=") + 1);
    }

    /**
     * Return the controller and its action given the request_uri
     */
    public function resolve()
    {
        $controller = null;
        $action = null;

        foreach ($this->routes as $k => $couple) {

            if ($this->request_uri == $k) {
                $controller = $couple['controller'];
                $action = $couple['action'];
            }
        }

        return [
            'controller' => $controller,
            'action' => $action,
        ];
    }
}