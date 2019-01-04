<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 1/4/19
 * Time: 12:52 PM
 */

namespace App\Model;

class OddChecker
{
    public function isOdd(int $num): bool
    {
        return $num % 2 === 0;
    }
}