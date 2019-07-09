<?php

namespace App\Contracts;

interface CacheStorage
{
    /**
     * @param string $key
     *
     * @return array
     */
    public function get(string $key): array;

    /**
     * @param string $key
     * @param array $value
     */
    public function set(string $key, array $value): void;

    /**
     * @param string $key
     *
     * @return bool
     */
    public function exists(string $key): bool;
}
