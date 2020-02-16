<?php
/**
 * Created by PhpStorm.
 * User: andreyfilenko
 * Date: 2019-01-19
 * Time: 23:30
 */

namespace SocialNews\User\Domain;


use DateTimeImmutable;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;

class User
{
    /**
     * @var UuidInterface
     */
    private $id;
    /**
     * @var string
     */
    private $nickname;
    /**
     * @var string
     */
    private $passwordHash;
    /**
     * @var DateTimeImmutable
     */
    private $createdAt;
    /**
     * @var int
     */
    private $failedAttempts;
    /**
     * @var DateTimeImmutable|null
     */
    private $lastFailedLoginAttempt;

    /**
     * @var array
     */
    private $recordedEvents = [];

    public function __construct(
        UuidInterface $id,
        string $nickname,
        string $passwordHash,
        DateTimeImmutable $createdAt,
        int $failedAttempts,
        ?DateTimeImmutable $lastFailedLoginAttempt
    ) {
        $this->id = $id;
        $this->nickname = $nickname;
        $this->passwordHash = $passwordHash;
        $this->createdAt = $createdAt;
        $this->failedAttempts = $failedAttempts;
        $this->lastFailedLoginAttempt = $lastFailedLoginAttempt;
    }

    public static function register(string $nickname, string $password): self
    {
        return new self(
            Uuid::uuid4(),
            $nickname,
            password_hash($password, PASSWORD_DEFAULT),
            new DateTimeImmutable(),
            0,
            null
        );
    }

    public function login(string $password): void
    {
        if (password_verify($password, $this->passwordHash)) {
            $this->failedAttempts = 0;
            $this->lastFailedLoginAttempt = null;
            $this->recordedEvents[] = new UserWasLoggedIn();

            return;
        }

        $this->failedAttempts++;
        $this->lastFailedLoginAttempt = new DateTimeImmutable();
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
    public function getNickname(): string
    {
        return $this->nickname;
    }

    /**
     * @return string
     */
    public function getPasswordHash(): string
    {
        return $this->passwordHash;
    }

    /**
     * @return DateTimeImmutable
     */
    public function getCreatedAt(): DateTimeImmutable
    {
        return $this->createdAt;
    }

    /**
     * @return int
     */
    public function getFailedAttempts(): int
    {
        return $this->failedAttempts;
    }

    /**
     * @return DateTimeImmutable|null
     */
    public function getLastFailedLoginAttempt(): ?DateTimeImmutable
    {
        return $this->lastFailedLoginAttempt;
    }

    public function getRecordedEvents(): array
    {
        return $this->recordedEvents;
    }

    public function clearRecordedEvents(): void
    {
        $this->recordedEvents = [];
    }
}
