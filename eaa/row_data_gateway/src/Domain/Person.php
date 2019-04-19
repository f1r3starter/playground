<?php

namespace App\Domain;

use App\Table\PersonGateway;

class Person
{
    /**
     * @var PersonGateway
     */
    private $data;

    public function __construct(PersonGateway $data)
    {
        $this->data = $data;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->data->getId();
    }

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->data->getFirstName();
    }

    /**
     * @param string $firstName
     *
     * @return self
     */
    public function setFirstName(string $firstName): self
    {
        $this->data->setFirstName($firstName);

        return $this;
    }

    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->data->getLastName();
    }

    /**
     * @param string $lastName
     *
     * @return self
     */
    public function setLastName(string $lastName): self
    {
        $this->data->setLastName($lastName);

        return $this;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->data->getEmail();
    }

    /**
     * @param string $email
     *
     * @return self
     */
    public function setEmail(string $email): self
    {
        $this->data->setEmail($email);

        return $this;
    }

    public function save(): void
    {
        $this->data->save();
    }

    public function delete(): void
    {
        $this->data->delete();
    }
}
