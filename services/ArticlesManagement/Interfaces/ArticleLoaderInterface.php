<?php


namespace services\ArticlesManagement\Interfaces;

use Entity\Article;
use framework\DependencyInjectionContainer;
use services\AdminManagement\AdminCollection;
use services\ArticlesManagement\ArticleCollection;
use services\CommentManagement\CommentCollection;

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

    /**
     * @param CommentCollection $commentCollection
     * @return mixed
     */
    public function setArticleNameForCommentCollection($commentCollection);

    /**
     * @param AdminCollection $adminCollection
     * @return mixed
     */
    public function setNbArticlesByAdmin($adminCollection);
}
