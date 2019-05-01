<?php

namespace App\Repository;

use App\Entity\Patient;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\QueryBuilder;

class IllnessHistoryRepository extends EntityRepository
{
    private function getQueryBuilder(): QueryBuilder
    {
        return $this->createQueryBuilder('ih');
    }

    public function getPatientIllnessHistory(Patient $patient): array
    {
        return $this->getQueryBuilder()
            ->andWhere('ih.patient = :patient')
            ->setParameter('patient', $patient)
            ->getQuery()
            ->getResult();
    }
}
