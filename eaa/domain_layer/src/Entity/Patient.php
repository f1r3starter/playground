<?php

namespace App\Entity;

class Patient
{
    /**
     * @var string
     */
    private $illness = '';

    /**
     * @var \Person
     */
    private $idPerson;


    /**
     * Set illness.
     *
     * @param string $illness
     *
     * @return Patient
     */
    public function setIllness($illness)
    {
        $this->illness = $illness;

        return $this;
    }

    /**
     * Get illness.
     *
     * @return string
     */
    public function getIllness()
    {
        return $this->illness;
    }

    /**
     * Set idPerson.
     *
     * @param \Person $idPerson
     *
     * @return Patient
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
