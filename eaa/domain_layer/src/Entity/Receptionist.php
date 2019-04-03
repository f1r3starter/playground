<?php

namespace App\Entity;

class Receptionist extends Person
{
    /**
     * @var AppointmentList
     */
    private $appointmentList;

    /**
     * Receptionist constructor.
     *
     * @param string $firstName
     * @param string $lastName
     * @param string $gender
     */
    public function __construct(string $firstName, string $lastName, string $gender)
    {
        parent::__construct($firstName, $lastName, $gender);
        $this->appointmentList = new AppointmentList();
    }

    public function createAppointment(Doctor $doctor, Patient $client, \DateTime $dateTime)
    {
        $this->appointmentList->addAppointment(
            new Appointment($doctor, $client, $dateTime)
        );
    }
}
