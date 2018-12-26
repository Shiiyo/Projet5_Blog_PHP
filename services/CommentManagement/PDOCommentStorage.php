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

    /**
     * @return array|bool
     */
    public function fetchAllComment()
    {
        $pdo = $this->pdo;
        try {
            $req = $pdo->prepare('SELECT * FROM comment ORDER BY add_date DESC');
            $req->execute();
            $commentArray = $req->fetchAll(\PDO::FETCH_ASSOC);
            return $commentArray;
        } catch (\PDOException $e) {
            return trigger_error($e->getMessage());
        }
    }

    /**
     * @param \Entity\Article $article
     * @return array|bool|mixed
     */
    public function fetchAllCommentByArticle($article)
    {
        $pdo = $this->pdo;
        try {
            $req = $pdo->prepare('SELECT * FROM comment WHERE id_blog_post = :articleId AND validation = 1 ORDER BY add_date DESC');
            $req->execute(array('articleId' => $article->getId()));
            $commentArray = $req->fetchAll(\PDO::FETCH_ASSOC);
            return $commentArray;
        } catch (\PDOException $e) {
            return trigger_error($e->getMessage());
        }
    }

    /**
     * @param \Entity\Article $article
     * @return array|bool|mixed
     */
    public function countCommentByArticle($article)
    {
        $pdo = $this->pdo;
        try {
            $req = $pdo->prepare('SELECT COUNT(id) AS nb_comment FROM comment WHERE id_blog_post = :articleId AND validation = 1');
            $req->execute(array('articleId' => $article->getId()));
            $commentArray = $req->fetchAll(\PDO::FETCH_ASSOC);
            return $commentArray;
        } catch (\PDOException $e) {
            return trigger_error($e->getMessage());
        }
    }

    /**
     * @param \Entity\Article $comment
     * @return bool|mixed
     */
    public function save($comment)
    {
        $pdo = $this->pdo;
        try {
            $req = $pdo->prepare('INSERT INTO comment VALUES (:id, :id_blog_post, :pseudo, :message, :email, :validation, :add_date)');
            $req->execute([
                'id' => $comment->getId(),
                'id_blog_post' => $comment->getIdArticle(),
                'pseudo' => $comment->getPseudo(),
                'message' => $comment->getMessage(),
                'email' => $comment->getEmail(),
                'validation' => $comment->getValidation(),
                'add_date' => $comment->getAddDate()
            ]);
            return true;
        } catch (\PDOException $e) {
            return trigger_error($e->getMessage());
        }
    }

    /**
     * @param $idComment
     * @return bool
     */
    public function accepted($idComment)
    {
        $pdo = $this->pdo;
        try {
            $req = $pdo->prepare('UPDATE comment SET validation = 1 WHERE id = :id');
            $req->execute([
                'id' => $idComment
            ]);
            return true;
        } catch (\PDOException $e) {
            return trigger_error($e->getMessage());
        }
    }

    /**
     * @param $idComment
     * @return bool
     */
    public function refused($idComment)
    {
        $pdo = $this->pdo;
        try {
            $req = $pdo->prepare('UPDATE comment SET validation = 2 WHERE id = :id');
            $req->execute([
                'id' => $idComment
            ]);
            return true;
        } catch (\PDOException $e) {
            return trigger_error($e->getMessage());
        }
    }
}
