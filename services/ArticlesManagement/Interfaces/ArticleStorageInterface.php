<?php


namespace services\ArticlesManagement\Interfaces;

use Entity\Admin;
use Entity\Article;
use Entity\Comment;

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

    /**
     * @param Article $article
     * @return mixed
     */
    public function update($article);

    /**
     * @param Comment $comment
     * @return mixed
     */
    public function findArticleName($comment);

    /**
     * @param Admin $admin
     * @return mixed
     */
    public function getNbArticlesByAdmin($admin);
}
