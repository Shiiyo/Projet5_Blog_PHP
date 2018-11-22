<?php

namespace services\ArticlesManagement;

use services\ArticlesManagement\Interfaces\ArticleStorageInterface;
use services\ArticlesManagement\Interfaces\ArticleLoaderInterface;
use framework\DependencyInjectionContainer;

class ArticleLoader implements ArticleLoaderInterface
{
    private $articleStorage;
    private $container;

    /**
     * ArticleLoader constructor.
     * @param ArticleStorageInterface $articleStorage
     * @param DependencyInjectionContainer $container
     */
    public function __construct($articleStorage, $container)
    {
        $this->articleStorage = $articleStorage;
        $this->container = $container;
    }

    public function getArticleCollection()
    {
        $articlesArray = $this->articleStorage->fetchAllArticle();
        $articlesObject = [];
        foreach ($articlesArray as $articleData) {
            $articlesObject[] = $this->createArticleFromArray($articleData);
        }
        $articlesCollection = $this->container->newArticleCollection($articlesObject);
        return $articlesCollection;
    }

    public function createArticleFromArray($articleData)
    {
        $article = $this->container->newArticle(
            $articleData['id'],
            $articleData['id_admin'],
            $articleData['title'],
            $articleData['resume'],
            $articleData['content'],
            $articleData['add_date']
        );

        if ($articleData['update_date'] !== null) {
            $article->setUpdateDate($articleData['update_date']);
        }

        return $article;
    }
}
