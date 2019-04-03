<?php

namespace App\Entity;

class Appointment
{
    /**
     * @var Doctor
     */
    private $doctor;

    /**
     * @var Patient
     */
    private $patient;

    /**
     * @var \DateTime
     */
    private $dateTime;

    /**
     * Appointment constructor.
     *
     * @param Doctor $doctor
     * @param Patient $patient
     * @param \DateTime $dateTime
     */
    public function __construct(Doctor $doctor, Patient $patient, \DateTime $dateTime)
    {
        $this->doctor = $doctor;
        $this->patient = $patient;
        $this->dateTime = $dateTime;
    }

    /**
     * @return Doctor
     */
    public function getDoctor(): Doctor
    {
        return $this->doctor;
    }

    /**
     * @param Doctor $doctor
     *
     * @return self
     */
    public function setDoctor(Doctor $doctor): self
    {
        $this->doctor = $doctor;

        return $this;
    }

    /**
     * @return Patient
     */
    public function getPatient(): Patient
    {
        return $this->patient;
    }

    /**
     * @param Patient $patient
     *
     * @return self
     */
    public function setPatient(Patient $patient): self
    {
        $this->patient = $patient;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getDateTime(): \DateTime
    {
        return $this->dateTime;
    }

    /**
     * @param \DateTime $dateTime
     *
     * @return self
     */
    public function setDateTime(\DateTime $dateTime): self
    {
        $this->dateTime = $dateTime;

        return $this;
    }
}
