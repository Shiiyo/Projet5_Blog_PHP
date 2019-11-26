<?php

namespace services\CommentManagement;

use services\CommentManagement\Interfaces\CloseCommentInterface;

class CloseComment implements CloseCommentInterface
{
    /**
     * @param $container
     * @return mixed
     */
    public function closeComment($container)
    {
        $idComment = $container->newEndParamURI()->getEndParamURI();
        $commentBuilder = $container->getCommentWriter($container);
        return $commentBuilder->refused($idComment);
    }
}
