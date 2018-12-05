<?php

namespace services\CommentManagement;

use framework\DependencyInjectionContainer;
use services\CommentManagement\Interfaces\CommentLoaderInterface;
use services\CommentManagement\Interfaces\CommentStorageInterface;

class CommentLoader implements CommentLoaderInterface
{
    private $commentStorage;
    private $container;
    private $commentBuilder;

    /**
     * CommentLoader constructor.
     * @param CommentStorageInterface $commentStorage
     * @param DependencyInjectionContainer $container
     */
    public function __construct($commentStorage, $container)
    {
        $this->commentStorage = $commentStorage;
        $this->container = $container;
    }

    /**
     * @return CommentCollection
     */
    public function getCommentCollectionForOneArticle($article)
    {
        $commentsArray = $this->commentStorage->fetchAllCommentByArticle($article);
        $commentsObject = [];
        if ($this->commentBuilder === null) {
            $this->commentBuilder = $this->container->newCommentBuilder();
        }
        foreach ($commentsArray as $commentData) {
            $comment = $this->commentBuilder->build($commentData);
            $commentsObject[] =$comment;
        }
        $commentsCollection = $this->container->newCommentCollection($commentsObject);
        return $commentsCollection;
    }

    public function getNbCommentForOneArticle($article)
    {
        $commentArray = $this->commentStorage->countCommentByArticle($article);
        $nbComment = $commentArray[0]['nb_comment'];
        return $nbComment;
    }
}
