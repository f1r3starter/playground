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
    /**
     * @var string
     */
    private $author;

    public function __construct(string $url, string $title, string $author)
    {
        $this->url = $url;
        $this->title = $title;
        $this->author = $author;
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

    /**
     * @return string
     */
    public function getAuthor(): string
    {
        return $this->author;
    }
}