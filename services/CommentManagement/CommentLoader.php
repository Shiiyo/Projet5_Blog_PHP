<?php

namespace services\CommentManagement;

use framework\DependencyInjectionContainer;
use services\CommentManagement\Interfaces\CommentLoaderInterface;
use services\CommentManagement\Interfaces\CommentStorageInterface;

class CommentLoader implements CommentLoaderInterface
{
    private $commentStorage;
    private $container;
    private $commentHydrator;

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
    public function getCommentCollectionForOneArticle($idArticle)
    {
        $commentsArray = $this->commentStorage->fetchAllCommentByArticleId($idArticle);
        $commentsObject = [];
        if ($this->commentHydrator === null) {
            $this->commentHydrator = $this->container->newCommentHydrator();
        }
        foreach ($commentsArray as $commentData) {
            $comment = $this->container->newComment();
            $this->commentHydrator->hydrate($commentData, $comment);
            $commentsObject[] =$comment;
        }
        $commentsCollection = $this->container->newCommentCollection($commentsObject);
        return $commentsCollection;
    }

    public function getNbCommentForOneArticle($idArticle)
    {
        $commentArray = $this->commentStorage->countCommentByArticleId($idArticle);
        $nbComment = $commentArray[0]['nb_comment'];
        return $nbComment;
    }
}
