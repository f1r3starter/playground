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

        $qb->addSelect('url')
            ->addSelect('title');
        $qb->from('submissions');
        $qb->orderBy('created_at', 'DESC');
        $rows = $qb->execute()->fetchAll();

        $submissions = [];
        foreach ($rows as $row)
        {
            $submissions[] = new Submission($row['url'], $row['title']);
        }

        return $submissions;
    }
}