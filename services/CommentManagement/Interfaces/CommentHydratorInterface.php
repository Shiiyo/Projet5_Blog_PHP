<?php

namespace services\CommentManagement\Interfaces;

use Entity\Comment;

interface CommentHydratorInterface
{
    /**
     * @param $commentArray
     * @param Comment $commentEntity
     */
    public function hydrate($commentArray, $commentEntity);
}
