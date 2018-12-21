<?php

namespace services\AdminManagement;

class AdminCollection implements \ArrayAccess, \IteratorAggregate
{
    private $admins;

    public function __construct(array $adminArray)
    {
        $this->admins = $adminArray;
    }

    public function offsetExists($offset)
    {
        return array_key_exists($offset, $this->admins);
    }

    public function offsetGet($offset)
    {
        return $this->admins[$offset];
    }

    public function offsetSet($offset, $value)
    {
        $this->admins[$offset] = $value;
    }

    public function offsetUnset($offset)
    {
        unset($this->admins[$offset]);
    }

    public function getIterator()
    {
        return new \ArrayIterator($this->admins);
    }
}
