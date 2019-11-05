<?php

namespace App;

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
     * @param $item
     */
    public function addLast($item): void;

    /**
     * @return object
     */
    public function removeFirst(): object;

    /**
     * @return object
     */
    public function removeLast(): object;

    /**
     * @return \Iterator
     */
    public function iterator(): \Iterator;
}
