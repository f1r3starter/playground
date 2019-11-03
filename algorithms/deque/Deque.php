<?php

namespace App;

class Deque implements DequeInterface
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

    /**
     * @param $item
     */
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

    /**
     * @return object
     */
    public function removeFirst(): object
    {
        if (null === $this->head) {
            throw new \LogicException();
        }

        $value = $this->head->getValue();

        if ($this->size > 1) {
            $this->head = $this->head->getNext();
            $this->head->setPrev(null);
        } else {
            $this->head = null;
            $this->tail = null;
        }

        --$this->size;

        return $value;
    }

    /**
     * @return object
     */
    public function removeLast(): object
    {
        if (null === $this->tail) {
            throw new \LogicException();
        }

        $value = $this->tail->getValue();

        if ($this->size > 1) {
            $this->tail = $this->tail->getPrev();
            $this->tail->setNext(null);
        } else {
            $this->head = null;
            $this->tail = null;
        }

        --$this->size;

        return $value;
    }

    /**
     * @return \Iterator|void
     */
    public function iterator(): \Iterator
    {
        return new DequeIterator($this->head);
    }
}
