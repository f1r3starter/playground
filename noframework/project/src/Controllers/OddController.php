<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 1/3/19
 * Time: 5:23 PM
 */

namespace App\Controllers;

use App\Model\OddChecker;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class OddController
{
    public function index(Request $request, $num)
    {
        $oddChecker = new OddChecker();
        if ($oddChecker->isOdd($num)) {
            return new Response('Number is odd');
        }
        return new Response('Number is even');
    }
}