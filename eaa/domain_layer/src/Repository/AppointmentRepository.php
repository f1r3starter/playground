<?php

namespace App\Repository;

use App\Entity\Doctor;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\QueryBuilder;

class AppointmentRepository extends EntityRepository
{
    public function getTodayAppointments(): array
    {
        return $this->getQueryBuilder()
            ->andWhere('DATE(a.dateTime) = CURDATE()')
            ->getQuery()
            ->getResult();
    }

    private function getQueryBuilder(): QueryBuilder
    {
        return $this->createQueryBuilder('a');
    }

    public function getDoctorAppointmentsHistory(Doctor $doctor): array
    {
        return $this->getQueryBuilder()
            ->andWhere('a.doctor = :doctor')
            ->setParameter('doctor', $doctor)
            ->orderBy('a.dateTime', 'DESC')
            ->getQuery()
            ->getResult();
    }
}
