<?php
/**
 * Created by PhpStorm.
 * User: andreyfilenko
 * Date: 2019-01-14
 * Time: 23:11
 */

namespace SocialNews\FrontPage\Infrastructure;


use Doctrine\DBAL\Connection;
use SocialNews\FrontPage\Application\Submission;
use SocialNews\FrontPage\Application\SubmissionQuery;

class DbalSubmissionQuery implements SubmissionQuery
{
    /**
     * @var Connection
     */
    private $connection;

    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
    }

    public function execute(): array
    {
        $qb = $this->connection->createQueryBuilder();

        $qb->addSelect('s.url')
            ->addSelect('s.title')
            ->addSelect('a.nickname')
            ->from('submissions', 's')
            ->innerJoin(
                's',
                'users',
                'a',
                's.author_user_id = a.id'
            )
            ->orderBy('s.created_at', 'DESC');
        $rows = $qb->execute()->fetchAll();

        $submissions = [];
        foreach ($rows as $row) {
            $submissions[] = new Submission($row['url'], $row['title'], $row['nickname']);
        }

        return $submissions;
    }
}
