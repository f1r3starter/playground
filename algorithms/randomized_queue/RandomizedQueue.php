<?php

namespace App;

class RandomizedQueue implements RandomizedQueueInterface
{
    /**
     * @var object[]
     */
    private $items;

    /**
     * @var int
     */
    private $size;

    /**
     * @return bool
     */
    public function isEmpty(): bool
    {
        return 0 === $this->size;
    }

    /**
     * @return int
     */
    public function size(): int
    {
        return $this->size;
    }

    /**
     * @param object $item
     */
    public function enqueue(object $item): void
    {
        $this->items[] = $item;
        ++$this->size;
    }

    /**
     * @return object
     */
    public function dequeue(): object
    {
        if ($this->isEmpty()) {
            throw new \LogicException();
        }

        $randomIndex = $this->randomIndex();
        $item = $this->items[$randomIndex];
        unset($this->items[$randomIndex]);
        --$this->size;

        return $item;
    }

    /**
     * @return object
     */
    public function sample(): object
    {
        if ($this->isEmpty()) {
            throw new \LogicException();
        }

        return $this->items[$this->randomIndex()];
    }

    /**
     * @return \Iterator
     */
    public function iterator(): \Iterator
    {
        return new RandomizedQueueIterator($this->items);
    }

    /**
     * @return int
     */
    private function randomIndex(): int
    {
        return array_rand($this->items);
    }
}
