<?php

namespace App\Entity;

class Doctor
{
    /**
     * @var string|null
     */
    private $speciality;

    /**
     * @var \Person
     */
    private $idPerson;


    /**
     * Set speciality.
     *
     * @param string|null $speciality
     *
     * @return Doctor
     */
    public function setSpeciality($speciality = null)
    {
        $this->speciality = $speciality;

        return $this;
    }

    /**
     * Get speciality.
     *
     * @return string|null
     */
    public function getSpeciality()
    {
        return $this->speciality;
    }

    /**
     * Set idPerson.
     *
     * @param \Person $idPerson
     *
     * @return Doctor
     */
    public function setIdPerson(\Person $idPerson)
    {
        $this->idPerson = $idPerson;

        return $this;
    }

    /**
     * Get idPerson.
     *
     * @return \Person
     */
    public function getIdPerson()
    {
        return $this->idPerson;
    }
}
