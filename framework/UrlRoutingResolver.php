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
        if($csvDoc)
        {
            $test = 0;
            while ($line = fgets($csvDoc))
            {
                $tab = explode(',',$line);
                $research = '/Projet5-BlogPHP'.$tab[1];
                $url = $this->getUrl();
                $checkParameterInPath = preg_match('#\{[a-zA-Z]+\}#', $research, $parameter);

                if($url == $research)
                {
                    $test = 1;
                    $controller = $tab[2];
                    $action = $tab[3];
                    $route = new Route($controller, $research, $action);
                }
                elseif ($checkParameterInPath == 1)
                {
                    //On vérifie que le début du chemin est le même pour $reseach et $url
                    //On vérifie que l'url contient bien des chiffres au bon endroit
                    //on stocke les chiffres dans une variable $parametre que l'on envoie au routeur qui l'envoie au controller
                }
            }
            if($test == 0)
            {
                $route = new Route('Page404Controller',$research,NULL);
            }
            return $route;
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