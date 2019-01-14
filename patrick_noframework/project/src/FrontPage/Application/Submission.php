<?php
/**
 * Created by PhpStorm.
 * User: andreyfilenko
 * Date: 2019-01-14
 * Time: 22:19
 */

namespace SocialNews\FrontPage\Application;


class Submission
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
     * @param string $url
     * @return Submission
     */
    public function setUrl(string $url): Submission
    {
        $this->url = $url;
        return $this;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return Submission
     */
    public function setTitle(string $title): Submission
    {
        $this->title = $title;
        return $this;
    }
}