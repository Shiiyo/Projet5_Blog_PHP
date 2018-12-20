<?php


namespace services\ArticlesManagement\Interfaces;

interface ArticleWriterInterface
{
    /**
     * @param $request
     * @return null
     */
    public function write($request);
}
