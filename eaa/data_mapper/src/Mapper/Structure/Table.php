<?php

namespace App\Mapper\Structure;

use ArrayObject;

class Table
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var Column|null
     */
    private $primaryKey;

    /**
     * @var ArrayObject
     */
    private $columns;

    public function __construct(string $name, ?ArrayObject $columns = null, ?Column $primaryKey = null)
    {
        $this->name = $name;
        $this->columns = $columns ?? new ArrayObject();
        $this->primaryKey = $primaryKey;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return Column|null
     */
    public function getPrimaryKey(): ?Column
    {
        return $this->primaryKey;
    }

    /**
     * @param Column $column
     *
     * @return self
     */
    public function setPrimaryKey(Column $column): self
    {
        $this->primaryKey = $column;

        return $this;
    }

    /**
     * @return Column[]|ArrayObject
     */
    public function getColumns(): ArrayObject
    {
        return $this->columns;
    }

    /**
     * @param Column $column
     *
     * @return self
     */
    public function addColumn(Column $column): self
    {
        if (!$this->columns->offsetGet($column->getName())) {
            $this->columns->offsetSet($column->getName(), $column);

            if ($column->isPrimary()) {
                $this->setPrimaryKey($column);
            }
        }

        return $this;
    }
}
