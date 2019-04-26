<?php

namespace App\Mapper\Hydrator;

interface Hydrator
{
    /**
     * @param array  $row
     * @param string $className
     *
     * @return mixed
     */
    public function hydrate(array $row, string $className);

    /**
     * @param $object
     * @param bool $withRelated
     *
     * @return array
     */
    public function dehydrate($object, bool $withRelated): array;
}
