<?php

namespace App\Repository;

use App\Entity\Patient;
use Doctrine\ORM\EntityRepository;

class PatientRepository extends EntityRepository
{
    public function getPatientById(string $id): Patient
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.id = :id')
            ->setParameter('id', $id)
            ->getQuery()
            ->getOneOrNullResult();
    }
}
