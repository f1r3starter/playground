<?php

namespace App\Table;

use App\DB\MyPDO;
use App\Domain\Person;
use DomainException;
use PDO;

class PersonFinder
{
    /**
     * @param MyPDO $pdo
     * @param int|null $id
     */
    public function __construct(MyPDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function findById(int $id): Person
    {
        $row = $this->pdo->run(
            "SELECT * FROM person WHERE person.id = ?",
            [$id]
        )->fetch(PDO::FETCH_ASSOC);

        if (!$row) {
            throw new DomainException(sprintf('Person with id %s not found', $id));
        }

        return new Person(PersonGateway::load($this->pdo, $row));
    }
}
