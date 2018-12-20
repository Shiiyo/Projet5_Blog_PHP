<?php

namespace services;

use services\Interfaces\ArticleFromURIInterface;

class ArticleFromURI implements ArticleFromURIInterface
{
    /**
     * @param $uri
     * @return string
     */
    public function getArticleFromURI()
    {
        $uri = $_SERVER['REQUEST_URI'];
        $arrayUri = explode('/', $uri);
        return end($arrayUri);
    }
}
