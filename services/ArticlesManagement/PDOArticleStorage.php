<?php

namespace services\ArticlesManagement;

use services\ArticlesManagement\Interfaces\ArticleStorageInterface;

class PDOArticleStorage implements ArticleStorageInterface
{
    private $pdo;

    public function __construct(\PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function fetchAllArticle()
    {
        $pdo = $this->pdo;
        try {
            $req = $pdo->prepare('SELECT * FROM blog_post ORDER BY update_date DESC');
            $req->execute();
            $articleArray = $req->fetchAll(\PDO::FETCH_ASSOC);
            return $articleArray;
        } catch (\PDOException $e) {
            return trigger_error($e->getMessage());
        }
    }

    public function fetchSingleArticle($id)
    {
        $pdo = $this->pdo;
        try {
            $req = $pdo->prepare('SELECT * FROM blog_post WHERE id = :id');
            $req->execute(array('id' => $id));
            $articleArray = $req->fetchAll(\PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            trigger_error($e->getMessage());
        }

        if (!$articleArray) {
            return null;
        }
        return $articleArray;
    }
}
