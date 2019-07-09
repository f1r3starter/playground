<?php

namespace App\Cache;

use App\Contracts\CacheStorage;

class MemoryCacheStorage implements CacheStorage
{
    /**
     * @var \ArrayObject
     */
    private $storage;

    public function __construct()
    {
        $this->storage = new \ArrayObject();
    }

    /**
     * @param string $key
     *
     * @return array
     */
    public function get(string $key): array
    {
        return $this->storage->offsetGet($key);
    }

    /**
     * @param string $key
     * @param array $value
     *
     * @return mixed
     */
    public function set(string $key, array $value): void
    {
        $this->storage->offsetSet($key, $value);
    }

    /**
     * @param string $key
     *
     * @return bool
     */
    public function exists(string $key): bool
    {
       return $this->storage->offsetExists($key);
    }
}
