<?php

namespace services\Research\Interfaces;

interface SearchAdminInterface
{
    /**
     * @param $container
     * @param $article
     * @return mixed
     */
    public function searchAdmin($container, $article);
}
