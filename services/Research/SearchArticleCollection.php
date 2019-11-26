<?php

namespace services\Research;

use services\Research\Interfaces\SearchArticleCollectionInterface;

class SearchArticleCollection implements SearchArticleCollectionInterface
{
    /**
     * @param $container
     * @return mixed
     */
    public function searchArticleCollection($container)
    {
        $articleCollection = $container->getArticleLoader($container)->getArticleCollection();
        $container->getCommentLoader($container)->setNbCommentForArticleCollection($articleCollection);
        $container->getAdminLoader($container)->setAdminNameForArticleCollection($articleCollection);
        return $articleCollection;
    }
}
