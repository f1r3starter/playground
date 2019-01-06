<?php
/**
 * Created by PhpStorm.
 * User: andreyfilenko
 * Date: 2019-01-06
 * Time: 21:54
 */
declare(strict_types = 1);

namespace SocialNews\FrontPage\Presentation;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class FrontPageController
{
    public function show(Request $request)
    {
        return new Response('Hello ' . $request->get('name', 'anonymous'));
    }
}