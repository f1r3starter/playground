<?php
/**
 * Created by PhpStorm.
 * User: andreyfilenko
 * Date: 2019-01-14
 * Time: 22:24
 */

namespace SocialNews\FrontPage\Application;


class MockSubmissionQuery implements SubmissionQuery
{
    private $submissions;

    public function __construct()
    {
        $this->submissions = [
            new Submission('https://google.com', 'Google'),
            new Submission('https://yandex.com', 'Yandex'),
            new Submission('https://bing.com', 'Bing'),
        ];
    }

    public function execute(): array
    {
        return $this->submissions;
    }
}