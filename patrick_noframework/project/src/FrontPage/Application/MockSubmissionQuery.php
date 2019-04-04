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
            new Submission('https://google.com', 'Google', 'test'),
            new Submission('https://yandex.com', 'Yandex', 'test'),
            new Submission('https://bing.com', 'Bing', 'test'),
        ];
    }

    public function execute(): array
    {
        return $this->submissions;
    }
}
