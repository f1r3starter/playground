<?php

namespace App\Mapper\Reader;

use App\Mapper\Structure\Table;

interface MetadataReader
{
    /**
     * @param string $className
     *
     * @return Table
     */
    public function prepareTable(string $className): Table;
}
