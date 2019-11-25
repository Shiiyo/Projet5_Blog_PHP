<?php

namespace services\Research;

use services\Research\Interfaces\SearchCommentInterface;

class SearchComment implements SearchCommentInterface
{
    /**
     * @param $container
     * @param $article
     * @return mixed
     */
    public function searchCommentCollection($container, $article)
    {
        $commentLoader = $container->getCommentLoader($container);
        return $commentLoader->getCommentCollectionForOneArticle($article);
    }
}
