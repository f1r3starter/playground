<?php

namespace App\Repository;

use App\Entity\Doctor;
use Doctrine\ORM\EntityRepository;

class DoctorRepository extends EntityRepository
{
    public function getDoctorById(string $id): Doctor
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.id = :id')
            ->setParameter('id', $id)
            ->getQuery()
            ->getOneOrNullResult();
    }
}
