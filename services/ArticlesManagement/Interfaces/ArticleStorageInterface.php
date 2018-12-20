<?php


namespace services\ArticlesManagement\Interfaces;

use Entity\Article;

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

    /**
     * @param Article $article
     * @return mixed
     */
    public function save($article);

    /**
     * @param Article $article
     * @return mixed
     */
    public function delete($article);
}
