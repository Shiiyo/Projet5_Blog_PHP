<?php


namespace services\ArticlesManagement\Interfaces;

interface ArticleStorageInterface
{
    /**
     * @return mixed
     */
    public function fetchAllArticle();
}
