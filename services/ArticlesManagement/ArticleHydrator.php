<?php

namespace services\ArticlesManagement;

use Entity\Article;

class ArticleHydrator
{
    /**
     * @param $articlesArray
     * @param Article $articleEntity
     */
    public function hydrate($articlesArray, $articleEntity)
    {
        $articleEntity->setId($articlesArray['id']);
        $articleEntity->setIdAdmin($articlesArray['id_admin']);
        $articleEntity->setTitle($articlesArray['title']);
        $articleEntity->setSlug($articlesArray['slug']);
        $articleEntity->setResume($articlesArray['resume']);
        $articleEntity->setContent($articlesArray['content']);
        $articleEntity->setAddDate($articlesArray['add_date']);
        $articleEntity->setUpdateDate($articlesArray['update_date']);
    }
}
