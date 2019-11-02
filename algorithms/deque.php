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
    private $head;

    /**
     * @var Node|null
     */
    private $tail;

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
        $newHead = new Node($item);
        if ($this->isEmpty()) {
            $this->head = $newHead;
            $this->tail = $newHead;
        } else {
            $this->head->setPrev($newHead);
            $newHead->setNext($this->head);
            $this->head = $newHead;
        }

        ++$this->size;
    }

    // add the item to the back
    public function addLast($item): void
    {
        $newTail = new Node($item);
        if (null !== $this->tail) {
            $newTail->setPrev($this->tail);
            $this->tail->setNext($newTail);
        }
        $this->tail = $newTail;
        $this->head = $this->head ?? $this->tail;

        ++$this->size;
    }

    // remove and return the item from the front
    public function removeFirst(): object
    {

    }

    // remove and return the item from the back
    public function removeLast(): object
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
