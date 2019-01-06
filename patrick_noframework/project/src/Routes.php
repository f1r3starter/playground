<?php
/**
 * Created by PhpStorm.
 * User: andreyfilenko
 * Date: 2019-01-06
 * Time: 21:51
 */

declare(strict_types = 1);

return [
    [
        'GET',
        '/',
        'SocialNews\FrontPage\Presentation\FrontPageController#show'
    ],
    [
        'GET',
        '/submit',
        'SocialNews\Submission\Presentation\SubmissionController#show'
    ]
];