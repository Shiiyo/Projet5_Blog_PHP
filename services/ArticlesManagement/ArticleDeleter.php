<?php

namespace services\ArticlesManagement;

use services\Interfaces\DeleterInterface;

class ArticleDeleter implements DeleterInterface
{
    private $articleStorage;

    public function __construct($articleStorage)
    {
        $this->articleStorage = $articleStorage;
    }

    public function delete($article)
    {
        return $this->articleStorage->delete($article);
    }
}
