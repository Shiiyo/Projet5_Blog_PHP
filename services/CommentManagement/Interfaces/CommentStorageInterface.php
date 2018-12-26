<?php

namespace services\CommentManagement\Interfaces;

use Entity\Article;

interface CommentStorageInterface
{
    /**
     * @param Article $article
     * @return mixed
     */
    public function fetchAllCommentByArticle($article);

    /**
     * @param Article $article
     * @return mixed
     */
    public function countCommentByArticle($article);

    /**
     * @param Article $article
     * @return mixed
     */
    public function save($article);

    /**
     * @param $idComment
     * @return mixed
     */
    public function accepted($idComment);

    /**
     * @param $idComment
     * @return mixed
     */
    public function refused($idComment);
}
