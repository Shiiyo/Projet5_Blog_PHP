<?php

namespace services\Research;

use services\Research\Interfaces\SearchAdminInterface;

class SearchAdmin implements SearchAdminInterface
{
    /**
     * @param $container
     * @param $article
     * @return mixed
     */
    public function searchAdmin($container, $article)
    {
        $adminLoader = $container->getAdminLoader($container);
        return $adminLoader->findOneById($article);
    }
}
