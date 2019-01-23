<?php
/**
 * Created by PhpStorm.
 * User: andreyfilenko
 * Date: 2019-01-23
 * Time: 19:42
 */

namespace SocialNews\Submission\Domain;


use Ramsey\Uuid\UuidInterface;

class AuthorId
{
    /**
     * @var string
     */
    private $id;

    public function __construct(string $id)
    {
        $this->id = $id;
    }

    public static function fromUuid(UuidInterface $id)
    {
        return new self($id->toString());
    }

    public function toString()
    {
        return $this->id;
    }
}