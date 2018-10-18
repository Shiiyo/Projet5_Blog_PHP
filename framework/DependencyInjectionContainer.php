<?php

namespace framework;

class DependencyInjectionContainer
{
    protected $parameters;
    protected $twigEnv;

    public function __construct(array $parameters)
    {
        $this->setParameters($parameters);
    }

    public function newRouter($container)
    {
        return new Router($container);
    }

    public function newUrlRoutingResolver($container, $url)
    {
        return new UrlRoutingResolver($container, $url);
    }

    public function newRoute($controller, $path)
    {
        return new Route($controller, $path);
    }

    public function newControllerLoader()
    {
        return new ControllerLoader();
    }

    public function newController($path, $params)
    {
        return new $path($params, $this->getTwigEnv());
    }

    public function newTwigLoaderFilesystem($path)
    {
        return new \Twig_Loader_Filesystem($path);
    }

    public function newTwigEnvironment($loader, $params = [])
    {
        $twigEnv = new \Twig_Environment($loader, $params);
        $this->setTwigEnv($twigEnv);
    }


    /**
     * @return \Twig_Environment
     */
    public function getTwigEnv() : \Twig_Environment
    {
        return $this->twigEnv;
    }

    /**
     * @return array
     */
    public function getParameters() : array
    {
        return $this->parameters;
    }

    /**
     * @param $num
     * @return mixed
     */
    public function getParam($num) : mixed
    {
        return $this->parameters[$num];
    }

    /**
     * @param \Twig_Environment $twigEnv
     */
    public function setTwigEnv(\Twig_Environment $twigEnv): void
    {
        $this->twigEnv = $twigEnv;
    }

    public function setParameters($parameters): void
    {
        $this->parameters = $parameters;
    }
}
