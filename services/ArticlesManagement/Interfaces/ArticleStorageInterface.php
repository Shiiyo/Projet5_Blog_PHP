<?php


namespace services\ArticlesManagement\Interfaces;

interface ArticleStorageInterface
{
    /**
     * @return mixed
     */
    public function fetchAllArticle();

    /**
     * @param $id
     * @return mixed
     */
    public function fetchSingleArticle($id);
}
