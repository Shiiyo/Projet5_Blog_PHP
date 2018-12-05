<?php

namespace services\CommentManagement\Interfaces;

use framework\DependencyInjectionContainer;
use services\CommentManagement\CommentCollection;

interface CommentLoaderInterface
{
    /**
     * CommentLoader constructor.
     * @param CommentStorageInterface $commentStorage
     * @param DependencyInjectionContainer $container
     */
    public function __construct($commentStorage, $container);

    /**
     * @return CommentCollection
     */
    public function getCommentCollectionForOneArticle($article);
}
