<?php

namespace App;

class Node
{
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

    /**
     * @param object $value
     */
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
