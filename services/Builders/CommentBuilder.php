<?php

namespace services\Builders;

use Entity\Comment;

class CommentBuilder implements BuilderInterface
{
    public function build($commentArray)
    {
        $comment = new Comment();
        $comment->setId($commentArray['id']);
        $comment->setIdArticle($commentArray['id_blog_post']);
        $comment->setPseudo($commentArray['pseudo']);
        $comment->setMessage($commentArray['message']);
        $comment->setEmail($commentArray['email']);
        $comment->setValidation($commentArray['validation']);
        $comment->setAddDate($commentArray['add_date']);
        return $comment;
    }
}
