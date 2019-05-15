<?php


namespace App\Repository\SelectionFactory;

use Doctrine\DBAL\Query\QueryBuilder;

interface SelectionFactory
{
    public function newSelection(SelectionModel $selectionModel, ?QueryBuilder $qb = null): void;
}
