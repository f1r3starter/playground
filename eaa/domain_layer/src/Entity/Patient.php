<?php

namespace App\Entity;

class Patient extends Person
{
    /**
     * @var string
     */
    private $illness = '';

    protected function __construct(string $firstName, string $lastName, string $gender, string $illness)
    {
        $this->illness = $illness;
        parent::__construct($firstName, $lastName, $gender);
    }

    public static function createPatientCard(string $firstName, string $lastName, string $gender, string $illness): self
    {
        return new self($firstName, $lastName, $gender, $illness);
    }

    /**
     * @param string $illness
     *
     * @return Patient
     */
    public function diagnoseIllness($illness)
    {
        $this->illness = $illness;

        return $this;
    }

    /**
     * @return string
     */
    public function tellIllness()
    {
        return $this->illness;
    }
}
