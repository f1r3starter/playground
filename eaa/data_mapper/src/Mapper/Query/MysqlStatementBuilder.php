<?php

namespace App\Mapper\Query;

use App\Mapper\Structure\Column;
use App\Mapper\Structure\Table;

class MysqlStatementBuilder implements StatementBuilder
{
    /**
     * @var Table
     */
    private $table;

    /**
     * @param Table $table
     */
    public function __construct(Table $table)
    {
        $this->table = $table;
    }

    /**
     * @return string
     */
    public function find(): string
    {
        $columns = implode(', ', $this->getColumns(true));
        $joins = implode(' ', $this->getJoins());

        return "SELECT {$columns} 
                FROM {$this->table->getName()} {$joins} 
                WHERE {$this->table->getName()}.{$this->table->getPrimaryKey()->getName()} = ?";
    }

    /**
     * @param bool $aliased
     * @param bool $includeRelated
     *
     * @return array
     */
    private function getColumns(bool $aliased = false, bool $includeRelated = true): array
    {
        return array_reduce(
            $this->table->getColumns()->getArrayCopy(),
            function (array $columns, Column $column) use ($aliased, $includeRelated) {
                $columnName = $this->table->getName() . '.' . $column->getName();
                $columns[] = $aliased ? $columnName . ' as ' . $this->table->getName() . $column->getName(
                    ) : $columnName;
                if ($includeRelated && $column->getRelatedTable()) {
                    $columns = array_merge($columns, (new self($column->getRelatedTable()))->getColumns($aliased));
                }

                return $columns;
            },
            []
        );
    }

    /**
     * @return array
     */
    private function getJoins(): array
    {
        return array_reduce(
            $this->table->getColumns()->getArrayCopy(),
            function (array $joins, Column $column) {
                if ($column->getRelatedTable()) {
                    $joins[] = "JOIN {$column->getRelatedTable()->getName()} ON {$this->table->getName()} . {$column->getName()} = {$column->getRelatedTable()->getName()} . {$column->getRelatedTable()->getPrimaryKey()->getName()}";
                    $joins = array_merge($joins, (new self($column->getRelatedTable()))->getJoins());
                }

                return $joins;
            },
            []
        );
    }

    /**
     * @return string
     */
    public function insert(): string
    {
        $columns = $this->getColumns(false, false);
        $dumbValues = implode(',', array_fill(0, count($columns), '?'));
        $columns = implode(', ', $columns);

        return "INSERT INTO {$this->table->getName()} ({$columns})
                VALUES ($dumbValues)";
    }

    /**
     * @return string
     */
    public function update(): string
    {
        $parameters = array_map(
            function ($column) {
                return "$column = ?";
            },
            $this->getColumns()
        );
        $joins = implode(" ", $this->getJoins());

        $parametersString = implode(', ', $parameters);

        return "UPDATE {$this->table->getName()} {$joins}
                SET $parametersString 
                WHERE {$this->table->getName()}.{$this->table->getPrimaryKey()->getName()} = ?";
    }

    /**
     * @return string
     */
    public function delete(): string
    {
        return "DELETE FROM {$this->table->getName()} WHERE {$this->table->getPrimaryKey()->getName()} = ?";
    }
}
