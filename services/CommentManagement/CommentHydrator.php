<?php

namespace services\CommentManagement;

use Entity\Comment;

class CommentHydrator
{
    /**
     * @param $commentArray
     * @param Comment $commentEntity
     */
    public function hydrate($commentArray, $commentEntity)
    {
        $commentEntity->setId($commentArray['id']);
        $commentEntity->setIdArticle($commentArray['id_blog_post']);
        $commentEntity->setPseudo($commentArray['pseudo']);
        $commentEntity->setMessage($commentArray['message']);
        $commentEntity->setEmail($commentArray['email']);
        $commentEntity->setValidation($commentArray['validation']);
        $commentEntity->setAddDate($commentArray['add_date']);
    }
}
