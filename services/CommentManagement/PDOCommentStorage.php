<?php

namespace services\CommentManagement;

use CommentHydratorInterface;
use services\CommentManagement\Interfaces\CommentStorageInterface;

class PDOCommentStorage implements CommentStorageInterface
{
    private $pdo;

    public function __construct(\PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function fetchAllCommentByArticleId($articleId)
    {
        $pdo = $this->pdo;
        try {
            $req = $pdo->prepare('SELECT * FROM comment WHERE id_blog_post = :articleId AND validation = 1 ORDER BY add_date DESC');
            $req->execute(array('articleId' => $articleId));
            $commentArray = $req->fetchAll(\PDO::FETCH_ASSOC);
            return $commentArray;
        } catch (\PDOException $e) {
            return trigger_error($e->getMessage());
        }
    }

    public function countCommentByArticleId($articleId)
    {
        $pdo = $this->pdo;
        try {
            $req = $pdo->prepare('SELECT COUNT(id) AS nb_comment FROM comment WHERE id_blog_post = :articleId AND validation = 1');
            $req->execute(array('articleId' => $articleId));
            $commentArray = $req->fetchAll(\PDO::FETCH_ASSOC);
            return $commentArray;
        } catch (\PDOException $e) {
            return trigger_error($e->getMessage());
        }
    }
}
