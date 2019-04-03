<?php

namespace App\Entity;

class AppointmentList
{
    private $appointments = [];

    public function addAppointment(Appointment $appointment)
    {
        $this->appointments[] = $appointment;
    }

    public function removeAppointment(Appointment $appointment)
    {
        $appointmentKey = array_search($appointment, $this->appointments);
        unset($this->appointments[$appointmentKey]);
    }
}
