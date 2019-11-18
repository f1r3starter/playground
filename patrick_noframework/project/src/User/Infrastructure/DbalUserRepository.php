<?php
/**
 * Created by PhpStorm.
 * User: andreyfilenko
 * Date: 2019-01-21
 * Time: 21:17
 */

namespace SocialNews\User\Infrastructure;


use DateTimeImmutable;
use Doctrine\DBAL\Connection;
use Doctrine\DBAL\Types\Type;
use Ramsey\Uuid\Uuid;
use SocialNews\User\Domain\User;
use SocialNews\User\Domain\UserRepository;
use SocialNews\User\Domain\UserWasLoggedIn;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Process\Exception\LogicException;

class DbalUserRepository implements UserRepository
{
    /**
     * @var Connection
     */
    private $connection;

    /**
     * @var Session
     */
    private $session;

    public function __construct(Connection $connection, Session $session)
    {

        $this->connection = $connection;
        $this->session = $session;
    }

    public function add(User $user): void
    {
        $qb = $this->connection->createQueryBuilder();
        $qb->insert('users');
        $qb->values([
            'id' => $qb->createNamedParameter($user->getId()->toString()),
            'nickname' => $qb->createNamedParameter($user->getNickname()),
            'password_hash' => $qb->createNamedParameter($user->getPasswordHash()),
            'created_at' => $qb->createNamedParameter($user->getCreatedAt(), Type::DATETIME),
        ]);

        $qb->execute();
    }

    public function save(User $user): void
    {
        foreach ($user->getRecordedEvents() as $recordedEvent) {
            if ($recordedEvent instanceof UserWasLoggedIn) {
                $this->session->set('userId', $user->getId()->toString());
                continue;
            }
            throw new LogicException(get_class($recordedEvent) . ' was not handled');
        }

        $user->clearRecordedEvents();
        $qb = $this->connection->createQueryBuilder();
        $qb->update('users')
            ->set('nickname', $qb->createNamedParameter($user->getNickname()))
            ->set('password_hash', $qb->createNamedParameter($user->getPasswordHash()))
            ->set('failed_login_attempts', $qb->createNamedParameter($user->getFailedAttempts()))
            ->set('last_failed_login_attempt', $qb->createNamedParameter($user->getLastFailedLoginAttempt(), Type::DATETIME))
            ->execute();
    }

    public function findByNickname(string $nickname): ?User
    {
        $qb = $this->connection->createQueryBuilder();
        $query = $qb->select('users.*')
            ->from('users')
            ->where('users.nickname = ' . $qb->createNamedParameter($nickname))
            ->execute();
        $row = $query->fetch();
        if ($row) {
            return $this->createUserFromRow($row);
        }

        return null;
    }

    private function createUserFromRow(array $row): ?User
    {
        if (!$row) {
            return null;
        }

        $lastFailedLoginAttempt = null;
        if ($row['last_failed_login_attempt']) {
            $lastFailedLoginAttempt = new DateTimeImmutable($row['last_failed_login_attempt']);
        }

        return new User(
            Uuid::fromString($row['id']),
            $row['nickname'],
            $row['password_hash'],
            new DateTimeImmutable($row['created_at']),
            $row['failed_login_attempts'],
            $lastFailedLoginAttempt
        );
    }
}
