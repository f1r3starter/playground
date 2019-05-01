<?php

namespace App\Entity;

/**
 * Doctor
 */
class Doctor extends Person
{
    /**
     * @var string
     */
    private $speciality;

    /**
     * @param string $firstName
     * @param string $lastName
     * @param string $gender
     * @param string $speciality
     *
     * @return self
     */
    public static function hireDoctor(string $firstName, string $lastName, string $gender, string $speciality): self
    {
        return new self($firstName, $lastName, $gender, $speciality);
    }

    protected function __construct(string $firstName, string $lastName, string $gender, string $speciality)
    {
        $this->speciality = $speciality;
        parent::__construct($firstName, $lastName, $gender);
    }

    /**
     * @param string $speciality
     *
     * @return Doctor
     */
    public function changeSpeciality($speciality)
    {
        $this->speciality = $speciality;

        return $this;
    }

    /**
     * @return string|null
     */
    public function tellSpeciality()
    {
        return $this->speciality;
    }
}
