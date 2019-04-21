<?php

namespace App\Model;


use App\DB\MyPDO;
use DomainException;
use PDO;

abstract class BaseModel
{
    /**
     * @var MyPDO
     */
    private $pdo;

    /**
     * @var string
     */
    protected $idColumn = 'id';

    abstract protected function getAttributes(): array;

    abstract protected function getTableName(): string;

    public function __construct(MyPDO $pdo)
    {
        $this->pdo = $pdo;
    }

    /**
     * @return string
     */
    public function getIdColumn(): string
    {
        return $this->idColumn;
    }

    /**
     * @param int $column
     */
    public function setIdColumn(int $column): void
    {
        $this->idColumn = $column;
    }

    public function save(): void
    {
        $this->{$this->getIdColumn()} ? $this->update() : $this->insert();
    }

    public function delete(): void
    {
        $this->pdo->prepare(
            "DELETE FROM {$this->getTableName()} WHERE {$this->getIdColumn()} = ?"
        )->execute([$this->{$this->getIdColumn()}]);
    }

    /**
     * @param int $id
     *
     * @return static
     */
    public function findById(int $id): self
    {
        $row = $this->pdo->run(
            "SELECT * FROM {$this->getTableName()} WHERE {$this->getIdColumn()} = ?",
            [$id]
        )->fetch(PDO::FETCH_ASSOC);

        if (!$row) {
            throw new DomainException(sprintf('Model with id %s not found', $id));
        }

        array_walk($row, function($value, $column) {
            if (property_exists($this, $column)) {
                $this->{$column} = $value;
            }
        });

        return $this;
    }

    private function insert(): void
    {
        $parameters = implode(',', $this->getAttributes());
        $dumbValues = implode(',',
            array_fill(0, count($this->getAttributes()), '?')
        );
        $realValues = array_map(function ($attribute) {
            return $this->$attribute;
        }, $this->getAttributes());

        $this->pdo->prepare(
            "INSERT INTO {$this->getTableName()} ($parameters) VALUES ($dumbValues)"
        )->execute($realValues);

        $this->{$this->getIdColumn()} = $this->pdo->lastInsertId();
    }

    private function update(): void
    {
        $parameters = array_map(function ($attribute) {
            return "$attribute = ?";
        }, $this->getAttributes());

        $values = array_map(function ($attribute) {
            return $this->$attribute;
        }, $this->getAttributes());

        $values[] = $this->{$this->idColumn};
        $parametersString = implode(', ', $parameters);

        $this->pdo->prepare(
            "UPDATE {$this->getTableName()} SET $parametersString WHERE {$this->idColumn} = ?"
        )->execute($values);
    }
}
