<?php


namespace services\Research\Interfaces;

interface SearchCommentInterface
{
    /**
     * @param $container
     * @param $article
     * @return mixed
     */
    public function searchCommentCollection($container, $article);
}
