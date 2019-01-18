<?php
/**
 * Created by PhpStorm.
 * User: andreyfilenko
 * Date: 2019-01-18
 * Time: 22:26
 */

namespace SocialNews\Submission\Application;


class SubmitLink
{
    /**
     * @var string
     */
    private $url;
    /**
     * @var string
     */
    private $title;

    public function __construct(string $url, string $title)
    {

        $this->url = $url;
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }
}