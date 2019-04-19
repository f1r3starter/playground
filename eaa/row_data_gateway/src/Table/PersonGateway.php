<?php

namespace App\Table;

use App\DB\MyPDO;

class PersonGateway
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $firstName;

    /**
     * @var string
     */
    private $lastName;

    /**
     * @var string
     */
    private $email;

    /**
     * @var PersonGateway
     */
    protected $personGateway;

    /**
     * @param MyPDO $pdo
     */
    private function __construct(MyPDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public static function load(MyPDO $pdo, array $row): self
    {
        $person = new self($pdo);
        $person->id = $row['id'];
        $person->firstName = $row['first_name'];
        $person->lastName = $row['last_name'];
        $person->email = $row['email'];

        return $person;
    }

    public static function create(MyPDO $pdo): self
    {
        $person = new self($pdo);
        $person->id = $person->insert();
        return $person;
    }

    public function save(): void
    {
        $this->pdo->prepare(
            "UPDATE person SET first_name = ?, last_name = ?, email = ? WHERE id = ?"
        )->execute([$this->firstName, $this->lastName, $this->email, $this->id]);
    }

    public function delete(): void
    {
        $this->pdo->prepare(
            "DELETE FROM person WHERE id = ?"
        )->execute([$this->id]);
    }

    /**
     * @return int
     */
    private function insert(): int
    {
        $this->pdo->prepare(
            "INSERT INTO person"
        )->execute();

        return $this->pdo->lastInsertId();
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     *
     * @return self
     */
    public function setFirstName(string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     *
     * @return self
     */
    public function setLastName(string $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     *
     * @return self
     */
    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }
}
