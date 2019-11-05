<?php

namespace App;

class RandomizedQueueIterator implements \Iterator
{
    /**
     * @var object[]
     */
    private $items;

    /**
     * @var int
     */
    private $index = 0;

    /**
     * @var int
     */
    private $size;

    /**
     * @param object[] $items
     * @param int|null $size
     */
    public function __construct(array $items, ?int $size = null)
    {
        shuffle($items);
        $this->items = $items;
        $this->size = $size ?? count($items);
    }

    /**
     * @return object
     */
    public function current(): object
    {
        return $this->items[$this->index];
    }

    public function next(): void
    {
        ++$this->index;
    }

    /**
     * @return int
     */
    public function key(): int
    {
        return $this->index;
    }

    /**
     * @return bool
     */
    public function valid(): bool
    {
        return $this->index < $this->size;
    }

    public function rewind(): void
    {
        $this->index = 0;
    }
}
