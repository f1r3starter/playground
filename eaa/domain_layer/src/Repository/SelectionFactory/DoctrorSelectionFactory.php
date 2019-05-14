<?php


namespace App\Repository\SelectionFactory;


use Doctrine\DBAL\Connection;
use Doctrine\DBAL\Query\QueryBuilder;

class DoctrorSelectionFactory implements SelectionFactory
{
    /**
     * @var Connection
     */
    private $connection;

    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
    }

    public function newSelection(DoctorSelectionModel $selectionModel, ?QueryBuilder $qb = null): void
    {
        if (null === $qb) {
            $qb = $this->connection->createQueryBuilder('d')
                ->from('doctor');
        }

        if ($selectionModel->getFirstName()) {
            $qb->andWhere('d.firstName = :firstName')
                ->setParameter('firstName', $selectionModel->getFirstName());
        }
    }
}
