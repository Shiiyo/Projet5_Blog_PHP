<?php

namespace framework;

use framework\Interfaces\RouteInterface;
use framework\Interfaces\UrlRoutingResolverInterface;

class UrlRoutingResolver implements UrlRoutingResolverInterface
{
    private $url;
    /**
     * @var RouteInterface
     */
    private $route;
    private $param;

    /**
     * UrlRoutingResolver constructor.
     * @param $url
     */
    public function __construct($url)
    {
        $this->setUrl($url);
    }

    /**
     * Analyse the URL and find the corresponding route.
     */
    public function findRoute() : void
    {
        $param = null;
        $csvDoc = fopen("../framework/routing.csv", "r+");
        if ($csvDoc) {
            $found = 0;
            $url = $this->getUrl();

            while ($line = fgets($csvDoc)) {
                $tab = explode(',', $line);
                $research = $tab[1];

                if (preg_match($research, $url)) {
                    $urlParameters = explode('/', $url);
                    if (preg_match('#admin#', $url)) {
                        if (isset($urlParameters[4])) {
                            $this->param = $urlParameters[4];
                        } else {
                            $this->param = null;
                        }
                    } else {
                        if (isset($urlParameters[3])) {
                            $this->param = $urlParameters[3];
                        } else {
                            $this->$param = null;
                        }
                    }

                    $found = 1;
                    $controller = $tab[2];
                    $this->setRoute(new Route($controller, $url));
                }
            }
            if ($found == 0) {
                $this->setRoute(new Route('Page404', 'Page404'));
            }
        }
    }

    //GETTERS
    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @return RouteInterface
     */
    public function getRoute(): RouteInterface
    {
        return $this->route;
    }

    /**
     * @return mixed
     */
    public function getParam()
    {
        return $this->param;
    }

    //SETTERS
    /**
     * @param string $url
     */
    public function setUrl(string $url): void
    {
        $this->url = $url;
    }

    /**
     * @param RouteInterface $route
     */
    public function setRoute(RouteInterface $route): void
    {
        $this->route = $route;
    }

    /**
     * @param mixed $param
     */
    public function setParam($param): void
    {
        $this->param = $param;
    }
}
