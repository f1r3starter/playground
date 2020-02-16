<?php
/**
 * Created by PhpStorm.
 * User: andreyfilenko
 * Date: 2019-01-21
 * Time: 21:38
 */

namespace SocialNews\User\Infrastructure;


use Doctrine\DBAL\Connection;
use SocialNews\User\Application\NicknameTakenQuery;

class DbalNicknameTakenQuery implements NicknameTakenQuery
{
    /**
     * @var Connection
     */
    private $connection;

    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
    }

    public function execute(string $nickname): bool
    {
        $qb = $this->connection->createQueryBuilder();
        $count = $qb->select('count(*)')
            ->from('users')
            ->where('nickname = ' . $qb->createNamedParameter($nickname))
            ->execute();

        return (bool)$count->fetchColumn();
    }
}
