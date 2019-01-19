<?php
/**
 * Created by PhpStorm.
 * User: andreyfilenko
 * Date: 2019-01-19
 * Time: 23:30
 */

namespace SocialNews\User\Domain;


use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;

class User
{
    /**
     * @var UuidInterface
     */
    private $uuid;
    /**
     * @var string
     */
    private $nickname;
    /**
     * @var string
     */
    private $passwordHash;
    /**
     * @var \DateTimeImmutable
     */
    private $createdAt;

    public function __construct(
        UuidInterface $uuid,
        string $nickname,
        string $passwordHash,
        \DateTimeImmutable $createdAt
    )
    {

        $this->uuid = $uuid;
        $this->nickname = $nickname;
        $this->passwordHash = $passwordHash;
        $this->createdAt = $createdAt;
    }

    public static function register(string $nickname, string $password): self
    {
        return new self(
            Uuid::uuid4(),
            $nickname,
            password_hash($password, PASSWORD_DEFAULT),
            new \DateTimeImmutable()
        );
    }
}