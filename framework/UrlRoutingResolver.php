<?php

namespace framework;

use framework\Interfaces\UrlRoutingResolverInterface;

class UrlRoutingResolver implements UrlRoutingResolverInterface
{
    private $url;

    /**
     * UrlRoutingResolver constructor.
     * @param $url
     */
    public function __construct($url)
    {
        $this->setUrl($url);
    }

    /**
     * Analyse the URL and find the corresponding route. It return an instance of the Route and the param
     * @return array|bool
     */
    public function findRoute()
    {
        $csvDoc = fopen("..\\framework\\routing.csv", "r+");
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
                            $param = $urlParameters[4];
                        } else {
                            $param = null;
                        }
                    } else {
                        if (isset($urlParameters[3])) {
                            $param = $urlParameters[3];
                        } else {
                            $param = null;
                        }
                    }

                    $found = 1;
                    $controller = $tab[2];
                    $route = new Route($controller, $url);
                }
            }
            if ($found == 0) {
                $route = new Route('Page404', 'Page404');
            }
            return $routeAndParam = [$route, $param];
        }
        return false;
    }

    //GETTERS

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    //SETTERS

    /**
     * @param string $url
     */
    public function setUrl(string $url): void
    {
        $this->url = $url;
    }
}
