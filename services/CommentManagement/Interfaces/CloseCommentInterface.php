<?php

namespace services\CommentManagement\Interfaces;

interface CloseCommentInterface
{
    /**
     * @param $container
     * @return mixed
     */
    public function closeComment($container);
}
