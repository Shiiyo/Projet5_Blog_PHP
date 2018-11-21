<?php

namespace framework\Session;

interface SessionInterface
{
    /**
     * @param string $key
     * @param bool $default
     * @return mixed
     */
    public function get(string $key, $default = null);

    /**
     * @param string $key
     * @param mixed $value
     */
    public function set(string $key, $value): void;

    /**
     * @param string $key
     */
    public function delete(string $key):void;
}
