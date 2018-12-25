<?php

namespace services\ArticlesManagement;

use services\ArticlesManagement\Interfaces\ArticleStorageInterface;
use services\ArticlesManagement\Interfaces\ArticleLoaderInterface;
use framework\DependencyInjectionContainer;
use Cocur\Slugify\Slugify;

class ArticleLoader implements ArticleLoaderInterface
{
    private $articleStorage;
    private $container;
    private $articleBuilder;

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

    /**
     * @return ArticleCollection
     */
    public function getArticleCollection()
    {
        $articlesArray = $this->articleStorage->fetchAllArticle();
        $articlesObject = [];
        if ($this->articleBuilder === null) {
            $this->articleBuilder = $this->container->newArticleBuilder();
        }
        foreach ($articlesArray as $articleData) {
            $article = $this->articleBuilder->build($articleData);
            $articlesObject[] =$article;
        }
        $articlesCollection = $this->container->newArticleCollection($articlesObject);
        return $articlesCollection;
    }

    /**
     * @param $id
     * @return \Entity\Article
     */
    public function findOneBySlug($slug)
    {
        $articleArray = $this->articleStorage->fetchSingleArticle($slug);
        if ($this->articleBuilder === null) {
            $this->articleBuilder = $this->container->newArticleBuilder();
        }
        $article = $this->articleBuilder->build($articleArray[0]);
        return $article;
    }

    public function setArticleNameForCommentCollection($commentCollection)
    {
        $slugify = new Slugify();

        foreach ($commentCollection as $comment) {
            $articleTitle = $this->articleStorage->findArticleName($comment);
            $comment->setArticleName($articleTitle);
            $comment->setArticleSlug($slugify->slugify($articleTitle));
        }
    }
}
