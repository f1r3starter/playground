<?php
/**
 * Created by PhpStorm.
 * User: andreyfilenko
 * Date: 2019-01-18
 * Time: 22:26
 */

namespace SocialNews\Submission\Application;


use Ramsey\Uuid\UuidInterface;

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

    /**
     * @var UuidInterface
     */
    private $authorId;

    public function __construct(UuidInterface $authorId, string $url, string $title)
    {
        $this->authorId = $authorId;
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

    public function getAuthorId(): UuidInterface
    {
        return $this->authorId;
    }
}