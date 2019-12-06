<?php

namespace App\Mapper\Structure;

class Column
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $propertyName;

    /**
     * @var bool
     */
    private $primary;

    /**
     * @var string|null
     */
    private $relatedClass;

    /**
     * @var Table|null
     */
    private $relatedTable;

    /**
     * Column constructor.
     * @param string $columnName
     * @param string $propertyName
     * @param bool $primary
     * @param string $relatedClass
     * @param Table|null $relatedTable
     */
    public function __construct(string $columnName, string $propertyName, bool $primary = false, string $relatedClass = null, Table $relatedTable = null)
    {
        $this->name = $columnName;
        $this->propertyName = $propertyName;
        $this->primary = $primary;
        $this->relatedClass = $relatedClass;
        $this->relatedTable = $relatedTable;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getPropertyName(): string
    {
        return $this->propertyName;
    }

    /**
     * @return bool
     */
    public function isPrimary(): bool
    {
        return $this->primary;
    }

    /**
     * @return string|null
     */
    public function getRelatedClass(): ?string
    {
        return $this->relatedClass;
    }

    /**
     * @return Table|null
     */
    public function getRelatedTable(): ?Table
    {
        return $this->relatedTable;
    }
}
