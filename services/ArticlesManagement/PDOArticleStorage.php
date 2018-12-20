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

    public function fetchSingleArticle($slug)
    {
        $pdo = $this->pdo;
        try {
            $req = $pdo->prepare('SELECT * FROM blog_post WHERE slug = :slug');
            $req->execute(array('slug' => $slug));
            $articleArray = $req->fetchAll(\PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            trigger_error($e->getMessage());
        }

        if (!$articleArray) {
            return null;
        }
        return $articleArray;
    }

    public function save($article)
    {
        $pdo = $this->pdo;
        try {
            $req = $pdo->prepare('INSERT INTO blog_post VALUES (:id, :id_admin, :title, :slug, :resume, :content, :add_date, :update_date)');
            $req->execute([
                'id' => $article->getId(),
                'id_admin' => $article->getIdAdmin(),
                'title' => $article->getTitle(),
                'slug' => $article->getSlug(),
                'resume' => $article->getResume(),
                'content' => $article->getContent(),
                'add_date' => $article->getAddDate(),
                'update_date' => $article->getUpdateDate()
            ]);
        } catch (\PDOException $e) {
            return trigger_error($e->getMessage());
        }
    }

    public function delete($article)
    {
        $pdo = $this->pdo;
        try {
            $req = $pdo->prepare('DELETE FROM blog_post WHERE id = :id');
            $req->execute([
               'id' => $article->getId()
            ]);
            return true;
        } catch (\PDOException $e) {
            return trigger_error($e->getMessage());
        }
    }
}
