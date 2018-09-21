<?php

namespace framework;

class Router
{
    private $routes = [
        '#^contact$#' => 'Controller\BlogController',
        '#^home$#' => 'Controller\HomeController',
        '#^blog/([0-9]+)$#' => 'Controller\ShowPostController',
        '#^blog/([0-9]+)/([a-z]+)$#' => 'Controller\ExamplePostController',
    ];
    private $request_uri;

    private $controller;
    private $params = [];

    public function __construct()
    {
        $this->request_uri = substr($_SERVER['REQUEST_URI'], strpos($_SERVER['REQUEST_URI'], "=") + 1);
    }

    /**
     * Revolves the controller and its action given the request_uri
     */
    public function resolve()
    {
        $controller = null;
        $action = null;

        foreach ($this->routes as $pattern => $couple) {

            if (preg_match($pattern, $this->request_uri, $matches)) {

                $this->controller = $this->routes[$pattern];

                foreach ($matches as $k => $value) {

                    if ($k > 0) {

                        $this->params[] = $value;
                    }
                }
            }
        }
    }

    public function getController()
    {
        return $this->controller;
    }

    public function getParams()
    {
        return $this->params;
    }
}