<?php

namespace framework;

use framework\Interfaces\UrlRoutingResolverInterface;

class UrlRoutingResolver implements UrlRoutingResolverInterface
{
    private $url;

    public function __construct($url)
    {
        $this->setUrl($url);
    }

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
                        if(isset($urlParameters[4])){
                            $param = $urlParameters[4];
                        }
                        else{
                            $param = NULL;
                        }
                    } else {
                        if (isset($urlParameters[3])){
                            $param = $urlParameters[3];
                        }
                        else {
                            $param = NULL;
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
    public function getUrl(): string
    {
        return $this->url;
    }

    //SETTERS
    public function setUrl(string $url): void
    {
        $this->url = $url;
    }
}
