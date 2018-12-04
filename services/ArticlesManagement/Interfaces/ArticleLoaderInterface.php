<?php


namespace services\ArticlesManagement\Interfaces;

use Entity\Article;
use framework\DependencyInjectionContainer;
use services\ArticlesManagement\ArticleCollection;

interface ArticleLoaderInterface
{
    /**
     * ArticleLoaderInterface constructor.
     * @param ArticleStorageInterface $articleStorage
     * @param DependencyInjectionContainer $container
     */
    public function __construct(ArticleStorageInterface $articleStorage, DependencyInjectionContainer $container);

    /**
     * @return ArticleCollection
     */
    public function getArticleCollection();

    /**
     * @param $id
     * @return Article
     */
    public function findOneBySlug($slug);
}
