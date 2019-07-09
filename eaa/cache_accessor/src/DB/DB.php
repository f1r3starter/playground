<?php

namespace App\DB;

use App\Contracts\Storage;

class DB implements Storage
{
    /**
     * @return array
     */
    public function firstQuery():  array
    {
        echo 'First was called';

        return ['data1'];
    }

    /**
     * @return array
     */
    public function secondQuery(): array
    {
        echo 'Second was called';

        return ['data2'];
    }
}
