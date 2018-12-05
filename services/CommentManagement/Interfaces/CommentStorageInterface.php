<?php

namespace services\CommentManagement\Interfaces;

interface CommentStorageInterface
{
    /**
     * @param int $articleId
     * @return mixed
     */
    public function fetchAllCommentByArticle($article);

    /**
     * @param int $articleId
     * @return mixed
     */
    public function countCommentByArticle($article);
}
