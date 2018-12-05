<?php

namespace services\ArticlesManagement\Interfaces;

use Entity\Article;

interface ArticleHydratorInterface
{
    /**
     * @param $articlesArray
     * @param Article $articleEntity
     */
    public function hydrate($articlesArray, $articleEntity);
}
