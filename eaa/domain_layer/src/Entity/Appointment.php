<?php

namespace App\Entity;

class Appointment
{
    /**
     * @var \DateTime
     */
    private $dateTime;

    /**
     * @var int
     */
    private $idAppointment;

    /**
     * @var \Patient
     */
    private $idPatient;

    /**
     * @var \Doctor
     */
    private $idDoctor;


    /**
     * Set dateTime.
     *
     * @param \DateTime $dateTime
     *
     * @return Appointment
     */
    public function setDateTime($dateTime)
    {
        $this->dateTime = $dateTime;

        return $this;
    }

    /**
     * Get dateTime.
     *
     * @return \DateTime
     */
    public function getDateTime()
    {
        return $this->dateTime;
    }

    /**
     * Get idAppointment.
     *
     * @return int
     */
    public function getIdAppointment()
    {
        return $this->idAppointment;
    }

    /**
     * Set idPatient.
     *
     * @param \Patient|null $idPatient
     *
     * @return Appointment
     */
    public function setIdPatient(\Patient $idPatient = null)
    {
        $this->idPatient = $idPatient;

        return $this;
    }

    /**
     * Get idPatient.
     *
     * @return \Patient|null
     */
    public function getIdPatient()
    {
        return $this->idPatient;
    }

    /**
     * Set idDoctor.
     *
     * @param \Doctor|null $idDoctor
     *
     * @return Appointment
     */
    public function setIdDoctor(\Doctor $idDoctor = null)
    {
        $this->idDoctor = $idDoctor;

        return $this;
    }

    /**
     * Get idDoctor.
     *
     * @return \Doctor|null
     */
    public function getIdDoctor()
    {
        return $this->idDoctor;
    }
}
