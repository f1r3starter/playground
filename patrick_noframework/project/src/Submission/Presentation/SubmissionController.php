<?php
/**
 * Created by PhpStorm.
 * User: andreyfilenko
 * Date: 2019-01-06
 * Time: 22:03
 */

namespace SocialNews\Submission\Presentation;


use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class SubmissionController
{
    public function show(Request $request)
    {
        return new Response(
            'Submission controller'
        );
    }
}