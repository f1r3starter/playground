<?php


namespace App\Repository\SelectionFactory;

use App\Entity\Doctor;
use App\Repository\DoctorRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\QueryBuilder;
use LogicException;

class DoctorSelectionFactory extends DoctorRepository implements SelectionFactory
{
    /**
     * @var EntityManager
     */
    private $em;

    /**
     * DoctorSelectionFactory constructor.
     *
     * @param EntityManager $em
     */
    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    public function newSelection(SelectionModel $selectionModel, ?QueryBuilder $qb = null): array
    {
        if (!$selectionModel instanceof DoctorSelectionModel) {
            throw new LogicException('Wrong selection model for this factory');
        }
        $qb = $qb ?? $this->em->createQueryBuilder()
                ->select('d')
                ->from(Doctor::class, 'd');

        $this->addField($qb, 'speciality', $selectionModel->getSpeciality());
        $this->addField($qb, 'firstName', $selectionModel->getFirstName());
        $this->addField($qb, 'lastName', $selectionModel->getLastName());

        return $qb->getQuery()
            ->getResult();
    }

    private function addField(QueryBuilder $qb, string $fieldName, $value): QueryBuilder
    {
        if ($value) {
            $qb->andWhere("d.$fieldName = :$fieldName")
                ->setParameter($fieldName, $value);
        }

        return $qb;
    }
}
