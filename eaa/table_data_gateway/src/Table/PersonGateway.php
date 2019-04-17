<?php

namespace App\Table;

use App\DB\MyPDO;
use App\Domain\Person;
use DomainException;
use PDO;

class PersonGateway
{
    /**
     * @var MyPDO
     */
    protected $pdo;

    /**\
     * @param MyPDO $pdo
     */
    public function __construct(MyPDO $pdo)
    {
        $this->pdo = $pdo;
    }

    /**
     * @param int $id
     *
     * @return Person
     */
    public function findById(int $id): Person
    {
        $row = $this->pdo->run(
            "SELECT * FROM person WHERE person.id = ?",
            [$id]
        )->fetch(PDO::FETCH_ASSOC);

        if (!$row) {
            throw new DomainException(sprintf('Person with id %s not found', $id));
        }

        return (new Person())
            ->setId($row['id'])
            ->setFirstName($row['first_name'])
            ->setLastName($row['last_name'])
            ->setEmail($row['email']);
    }

    /**
     * @param string $firstName
     * @param string $lastName
     * @param string $email
     *
     * @return int
     */
    public function create(string $firstName, string $lastName, string $email): int
    {
        $this->pdo->prepare(
            "INSERT INTO person VALUES(%s, %s, %s)"
        )->execute([$firstName, $lastName, $email]);

        return $this->pdo->lastInsertId();
    }

    /**
     * @param int $id
     * @param string $firstName
     * @param string $lastName
     * @param string $email
     */
    public function update(int $id, string $firstName, string $lastName, string $email): void
    {
        $this->pdo->prepare(
            "UPDATE person SET first_name = ?, last_name = ?, email = ? WHERE id = ?"
        )->execute([$firstName, $lastName, $email, $id]);
    }

    /**
     * @param int $id
     */
    public function delete(int $id): void
    {
        $this->pdo->prepare(
            "DELETE FROM person WHERE id = ?"
        )->execute([$id]);
    }
}
