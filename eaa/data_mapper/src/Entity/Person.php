<?php

namespace App\Entity;

/**
 * @Table(name=PERSONN)
 */
class Person
{
    /**
     * @Column(primary=true,name=ID)
     */
    private $id;

    /**
     * @Column(name=FIRST_NAME)
     */
    private $firstName;

    /**
     * @Column(name=LAST_NAME)
     */
    private $lastName;

    /**
     * @Column(name=EMAIL_ID,relatedClass=App\Entity\Email)
     */
    private $email;

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
    public function setFirstName(string $firstName): Person
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
     * @return Email
     */
    public function getEmail(): Email
    {
        return $this->email;
    }

    /**
     * @param Email $email
     *
     * @return self
     */
    public function setEmail(Email $email): self
    {
        $this->email = $email;

        return $this;
    }
}
