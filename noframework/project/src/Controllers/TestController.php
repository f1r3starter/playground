<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 1/3/19
 * Time: 5:23 PM
 */

namespace App\Controllers;

use Symfony\Component\HttpFoundation\Response;

class TestController
{
    public function index($var)
    {
        return new Response('Blah blah' . $var);
    }
}