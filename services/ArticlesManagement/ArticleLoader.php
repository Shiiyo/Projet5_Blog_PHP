<?php

namespace services\ArticlesManagement;

use services\ArticlesManagement\Interfaces\ArticleStorageInterface;
use services\ArticlesManagement\Interfaces\ArticleLoaderInterface;
use framework\DependencyInjectionContainer;

class ArticleLoader implements ArticleLoaderInterface
{
    private $articleStorage;
    private $container;
    private $articleHydrator;

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
        if ($this->articleHydrator === null) {
            $this->articleHydrator = $this->container->newArticleHydrator();
        }
        foreach ($articlesArray as $articleData) {
            $article = $this->container->newArticle();
            $this->articleHydrator->hydrate($articleData, $article);
            $articlesObject[] =$article;
        }
        $articlesCollection = $this->container->newArticleCollection($articlesObject);
        return $articlesCollection;
    }

    public function findOneById($id)
    {
        $articleArray = $this->articleStorage->fetchSingleArticle($id);
        if ($this->articleHydrator === null) {
            $this->articleHydrator = $this->container->newArticleHydrator();
        }
        $article = $this->container->newArticle();
        $this->articleHydrator->hydrate($articleArray[0], $article);
        return $article;
    }
}
