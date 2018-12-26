<?php

namespace services;

use services\Interfaces\EndParamURIInterface;

class EndParamURI implements EndParamURIInterface
{
    /**
     * @param $uri
     * @return string
     */
    public function getEndParamURI()
    {
        $uri = $_SERVER['REQUEST_URI'];
        $arrayUri = explode('/', $uri);
        return end($arrayUri);
    }
}
