<?php

namespace App\Table;

use App\DB\MyPDO;
use DomainException;
use PDO;

abstract class Table
{
    /**
     * @var MyPDO
     */
    protected $pdo;

    public function __construct(MyPDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function findById(string $id): array
    {
        $row = $this->pdo->run(
            sprintf("SELECT * FROM %1$ WHERE %1$.id = ?", $this->getTableName()),
            [$id]
        )->fetch(PDO::FETCH_ASSOC);

        if (!$row) {
            throw new DomainException(sprintf('Row with id %s not found', $id));
        }

        return $row;
    }

    abstract protected function getTableName(): string;
}
