<?php

namespace App;

use Iterator;

interface RandomizedQueueInterface
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
    public function enqueue(object $item): void;

    /**
     * @return object
     */
    public function dequeue(): object;

    /**
     * @return object
     */
    public function sample(): object;

    /**
     * @return Iterator
     */
    public function iterator(): Iterator;
}
