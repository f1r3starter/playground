<?php

namespace App\Entity;

/**
 * @Table(name=EMAIL)
 */
class Email
{
    /**
     * @Column(primary,name=ID)
     */
    private $id;

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
     * @param int $id
     *
     * @return self
     */
    public function setId($id): self
    {
        $this->id = $id;

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
    public function setEmail($email): self
    {
        $this->email = $email;

        return $this;
    }


}
