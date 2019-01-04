<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 1/4/19
 * Time: 4:13 PM
 */

namespace App\Tests\Model;


use App\Model\OddChecker;
use PHPUnit\Framework\TestCase;

class OddCheckerTest extends TestCase
{
    public function testIsOdd()
    {
        $oddChecker = new OddChecker();

        $this->assertTrue($oddChecker->isOdd(4));
        $this->assertFalse($oddChecker->isOdd(5));
    }
}