<?php

namespace App\Cache;

use App\Contracts\CacheStorage;
use App\Contracts\Storage;

class Cache implements Storage
{
    /**
     * @var Storage
     */
    private $storage;

    /**
     * @var CacheStorage
     */
    private $cacheStorage;

    /**
     * @param Storage $storage
     * @param CacheStorage $cacheStorage
     */
    public function __construct(Storage $storage, CacheStorage $cacheStorage)
    {
        $this->storage = $storage;
        $this->cacheStorage = $cacheStorage;
    }

    /**
     * @return array
     */
    public function firstQuery(): array
    {
        return $this->getQuery('first', function() {
            return $this->storage->firstQuery();
        });
    }

    /**
     * @return array
     */
    public function secondQuery(): array
    {
        return $this->getQuery('second', function() {
            return $this->storage->secondQuery();
        });
    }

    /**
     * @param string $key
     * @param \Closure $getValue
     *
     * @return array
     */
    private function getQuery(string $key, \Closure $getValue): array
    {
        if ($this->cacheStorage->exists($key)) {
            return $this->cacheStorage->get($key);
        }

        $value = $getValue();
        $this->cacheStorage->set($key, $value);

        return $value;
    }
}
