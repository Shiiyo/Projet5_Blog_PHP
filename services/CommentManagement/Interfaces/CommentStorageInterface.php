<?php

namespace services\CommentManagement\Interfaces;

interface CommentStorageInterface
{
    /**
     * @param int $articleId
     * @return mixed
     */
    public function fetchAllCommentByArticleId($articleId);

    /**
     * @param int $articleId
     * @return mixed
     */
    public function countCommentByArticleId($articleId);
}
