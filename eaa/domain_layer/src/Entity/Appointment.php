<?php

namespace App\Entity;

class Appointment
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var \DateTime
     */
    private $dateTime;

    /**
     * @var Patient
     */
    private $patient;

    /**
     * @var Doctor
     */
    private $doctor;

    /**
     * @param Doctor $doctor
     * @param Patient $patient
     * @param \DateTime $dateTime
     *
     * @return self
     */
    public static function createAppointment(Doctor $doctor, Patient $patient, \DateTime $dateTime): self
    {
        return new self($doctor, $patient, $dateTime);
    }

    private function __construct(Doctor $doctor, Patient $patient, \DateTime $dateTime)
    {
        $this->doctor = $doctor;
        $this->patient = $patient;
        $this->dateTime = $dateTime;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param \DateTime $dateTime
     *
     * @return self
     */
    public function changeDateTime(\DateTime $dateTime): self
    {
        $this->dateTime = $dateTime;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getDateTime()
    {
        return $this->dateTime;
    }

    /**
     * @return Patient
     */
    public function getPatient(): Patient
    {
        return $this->patient;
    }

    /**
     * @param Doctor|null $doctor
     *
     * @return self
     */
    public function changeDoctor(Doctor $doctor): self
    {
        $this->doctor = $doctor;

        return $this;
    }

    /**
     * @return Doctor
     */
    public function getDoctor(): Doctor
    {
        return $this->doctor;
    }
}
