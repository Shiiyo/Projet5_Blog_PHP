<?php

namespace services\ArticlesManagement;

class ArticleCollection implements \ArrayAccess, \IteratorAggregate
{
    private $articles;

    public function __construct(array $articlesArray)
    {
        $this->articles = $articlesArray;
    }

    public function offsetExists($offset)
    {
        return array_key_exists($offset, $this->articles);
    }

    public function offsetGet($offset)
    {
        return $this->articles[$offset];
    }

    public function offsetSet($offset, $value)
    {
        $this->articles[$offset] = $value;
    }

    public function offsetUnset($offset)
    {
        unset($this->articles[$offset]);
    }

    public function getIterator()
    {
        return new \ArrayIterator($this->articles);
    }
}
