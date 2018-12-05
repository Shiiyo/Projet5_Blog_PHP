<?php

namespace services\Builders;

use Entity\Article;

class ArticleBuilder implements BuilderInterface
{
    public function build($articleArray)
    {
        $article = new Article();
        $article->setId($articleArray['id']);
        $article->setIdAdmin($articleArray['id_admin']);
        $article->setTitle($articleArray['title']);
        $article->setSlug($articleArray['slug']);
        $article->setResume($articleArray['resume']);
        $article->setContent($articleArray['content']);
        $article->setAddDate($articleArray['add_date']);
        $article->setUpdateDate($articleArray['update_date']);
        return $article;
    }
}
