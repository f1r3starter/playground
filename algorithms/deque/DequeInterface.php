<?php

namespace App;

use Iterator;

interface DequeInterface
{
    /**
     * @return bool
     */
    public function isEmpty(): bool;

    /**
     * @return int
     */
    public function size(): int;

    /**
     * @param object $item
     */
    public function addFirst(object $item): void;

    /**
     * @param object $item
     */
    public function addLast(object $item): void;

    /**
     * @return object
     */
    public function removeFirst(): object;

    /**
     * @return object
     */
    public function removeLast(): object;

    /**
     * @return Iterator
     */
    public function iterator(): Iterator;
}
