<?php

namespace services;

use services\Interfaces\IdArticleFromURIInterface;

class IdArticleFromURI implements IdArticleFromURIInterface
{
    /**
     * @param $uri
     * @return string
     */
    public function getIdArticleFromURI()
    {
        $uri = $_SERVER['REQUEST_URI'];
        $arrayUri = explode('/', $uri);
        return $arrayUri[2];
    }
}
