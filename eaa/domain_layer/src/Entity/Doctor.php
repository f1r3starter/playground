<?php

namespace App\Entity;

class Doctor extends Person
{
    /**
     * Doctor constructor.
     *
     * @param string $firstName
     * @param string $lastName
     * @param string $gender
     * @param string $speciality
     */
    public function __construct(string $firstName, string $lastName, string $gender, string $speciality)
    {
        parent::__construct($firstName, $lastName, $gender);
        $this->speciality = $speciality;
    }

    /**
     * @var string
     */
    private $speciality;

    /**
     * @return string
     */
    public function getSpeciality(): string
    {
        return $this->speciality;
    }
}
