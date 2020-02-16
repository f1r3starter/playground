<?php
/**
 * Created by PhpStorm.
 * User: andreyfilenko
 * Date: 2019-01-18
 * Time: 22:21
 */

namespace SocialNews\Submission\Domain;


use DateTimeImmutable;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;

class Submission
{
    /**
     * @var UuidInterface
     */
    private $id;
    /**
     * @var string
     */
    private $url;
    /**
     * @var string
     */
    private $title;
    /**
     * @var DateTimeImmutable
     */
    private $creationDate;
    /**
     * @var AuthorId
     */
    private $authorId;

    public function __construct(
        UuidInterface $id,
        AuthorId $authorId,
        string $url,
        string $title,
        DateTimeImmutable $creationDate
    ) {
        $this->id = $id;
        $this->url = $url;
        $this->title = $title;
        $this->creationDate = $creationDate;
        $this->authorId = $authorId;
    }

    public static function submit(UuidInterface $authorId, string $url, string $title): self
    {
        return new self(
            Uuid::uuid4(),
            AuthorId::fromUuid($authorId),
            $url,
            $title,
            new DateTimeImmutable()
        );
    }

    /**
     * @return UuidInterface
     */
    public function getId(): UuidInterface
    {
        return $this->id;
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
     * @return DateTimeImmutable
     */
    public function getCreationDate(): DateTimeImmutable
    {
        return $this->creationDate;
    }

    public function getAuthorId(): AuthorId
    {
        return $this->authorId;
    }
}
