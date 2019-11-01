<?php

class Deque implements Iterable
{
    /**
     * @var int
     */
    private $size = 0;

    /**
     * @var Node|null
     */
    private $first;

    /**
     * @var Node|null
     */
    private $last;

    /**
     * @return bool
     */
    public function isEmpty(): bool
    {
        return $this->size === 0;
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
    public function addFirst(object $item): void
    {
        $newFirst = new Node($item);
        if ($this->isEmpty()) {
            $this->first = $newFirst;
            $this->last = $newFirst;
        } else {
            $this->first->setPrev($newFirst);
            $newFirst->setNext($this->first);
            $this->first = $newFirst;
        }

        ++$this->size;
    }

    // add the item to the back
    public function addLast($item): void
    {

    }

    // remove and return the item from the front
    public function removeFirst()
    {

    }

    // remove and return the item from the back
    public function removeLast()
    {

    }

    // return an iterator over items in order from front to back
    public function iterator()
    {

    }
}

class Node {
    /**
     * @var object
     */
    private $value;

    /**
     * @var Node|null
     */
    private $prev;

    /**
     * @var Node|null
     */
    private $next;

    public function __construct(object $value)
    {
        $this->value = $value;
    }

    /**
     * @return object
     */
    public function getValue(): object
    {
        return $this->value;
    }

    /**
     * @return Node|null
     */
    public function getPrev(): ?Node
    {
        return $this->prev;
    }

    /**
     * @param Node|null
     *
     * @return Node
     */
    public function setPrev(?Node $prev): self
    {
        $this->prev = $prev;

        return $this;
    }

    /**
     * @return Node|null
     */
    public function getNext(): ?Node
    {
        return $this->next;
    }

    /**
     * @param Node|null $next
     *
     * @return Node
     */
    public function setNext(?Node $next): self
    {
        $this->next = $next;

        return $this;
    }
}
