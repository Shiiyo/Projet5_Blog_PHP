<?php

namespace services\CommentManagement;

use services\CommentManagement\Interfaces\PutOnlineCommentInterface;

class PutOnlineComment implements PutOnlineCommentInterface
{
    /**
     * @param $container
     * @return mixed
     */
    public function putOnlineComment($container)
    {
        $idComment = $container->newEndParamURI()->getEndParamURI();
        $commentBuilder = $container->getCommentWriter($this->container);
        return $commentBuilder->accepted($idComment);
    }
}
