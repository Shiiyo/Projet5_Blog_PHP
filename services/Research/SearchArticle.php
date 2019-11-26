<?php

namespace services\Research;

use services\Research\Interfaces\SearchArticleInterface;

class SearchArticle implements SearchArticleInterface
{
    /**
     * @param $container
     * @return mixed
     */
    public function searchArticle($container)
    {
        $slugArticle = $container->newEndParamURI()->getEndParamURI();
        $articleLoader = $container->getArticleLoader($container);
        return $articleLoader->findOneBySlug($slugArticle);
    }
}
