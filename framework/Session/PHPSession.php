<?php

namespace framework\Session;

use framework\Session\Interfaces\SessionInterface;

class PHPSession implements SessionInterface
{
    /**
     * @param string $key
     * @param bool $default
     * @return mixed
     */
    public function get(string $key, $default = null)
    {
        if (array_key_exists($key, $_SESSION)) {
            return $_SESSION[$key];
        }
        return $default;
    }

    /**
     * @param string $key
     * @param mixed $value
     */
    public function set(string $key, $value): void
    {
        $_SESSION[$key] = $value;
    }

    /**
     * @param string $key
     */
    public function delete(string $key): void
    {
        unset($_SESSION[$key]);
    }
}
