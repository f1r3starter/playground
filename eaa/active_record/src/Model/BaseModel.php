<?php

namespace App\Model;


use App\DB\MyPDO;

abstract class BaseModel
{
    /**
     * @var MyPDO
     */
    private $pdo;

    /**
     * @var int
     */
    protected $idColumn = 'id';

    abstract protected function getAttributes(): array;

    public function __construct(MyPDO $pdo)
    {
        $this->pdo = $pdo;
    }

    /**
     * @return int
     */
    public function getIdColumn(): int
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

    }

    private function insert(): void
    {

    }

    private function update(): void
    {

    }
}
