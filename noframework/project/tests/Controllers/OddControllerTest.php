<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 1/4/19
 * Time: 4:10 PM
 */

namespace App\Tests\Controllers;


use App\Controllers\OddController;
use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpFoundation\Request;

class OddControllerTest extends TestCase
{
    public function testIndex()
    {
        $oddController = new OddController();

        $result = $oddController->index(new Request(), 4);

        $this->assertContains('Number is odd', $result->getContent());

        $result = $oddController->index(new Request(), 5);

        $this->assertContains('Number is even', $result->getContent());
    }
}