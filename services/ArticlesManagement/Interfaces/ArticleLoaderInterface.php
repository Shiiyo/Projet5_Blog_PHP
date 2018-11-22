<?php


namespace services\ArticlesManagement\Interfaces;

use framework\DependencyInjectionContainer;

interface ArticleLoaderInterface
{
    /**
     * ArticleLoaderInterface constructor.
     * @param ArticleStorageInterface $articleStorage
     * @param DependencyInjectionContainer $container
     */
    public function __construct(ArticleStorageInterface $articleStorage, DependencyInjectionContainer $container);

    /**
     * @return ArticleCollectionInterface
     */
    public function getArticleCollection();
}
