<?php

namespace App;

use Iterator;

class DequeIterator implements Iterator
{
    /**
     * @var Node|null
     */
    private $currentNode;

    /**
     * @var int
     */
    private $key = 0;

    /**
     * @param Node $currentNode
     */
    public function __construct(Node $currentNode)
    {
        $this->currentNode = $currentNode;
    }

    /**
     * @return object
     */
    public function current(): object
    {
        return $this->currentNode->getValue();
    }

    public function next(): void
    {
        $this->currentNode = $this->currentNode->getNext();
        ++$this->key;
    }

    /**
     * @return int
     */
    public function key(): int
    {
        return $this->key;
    }

    /**
     * @return bool
     */
    public function valid(): bool
    {
        return null !== $this->currentNode;
    }

    public function rewind(): void
    {
        if (null !== $this->currentNode->getPrev()) {
            $this->currentNode = $this->currentNode->getPrev();
            $this->rewind();
        } else {
            $this->key = 0;
        }
    }
}
