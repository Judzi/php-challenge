<?php

namespace App\Shared\Domain\Cache;

interface ICacheDriver
{
    /**
     * @param string|int $key
     * @return mixed
     */
    public function get($key);

    /**
     * @param string|int $key
     * @param mixed $value
     */
    public function set($key, $value);
}
