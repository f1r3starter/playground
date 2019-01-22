<?php
/**
 * Created by PhpStorm.
 * User: andreyfilenko
 * Date: 2019-01-22
 * Time: 23:26
 */

namespace SocialNews\Framework\Rbac;


use Ramsey\Uuid\Uuid;
use SocialNews\Framework\Rbac\Role\Author;
use Symfony\Component\HttpFoundation\Session\Session;

class SymfonySessionCurrentUserFactory implements CurrentUserFactory
{
    /**
     * @var Session
     */
    private $session;

    public function __construct(Session $session)
    {
        $this->session = $session;
    }

    public function create(): User
    {
        if (!$this->session->has('userId')) {
            return new Guest();
        }

        return new AuthenticatedUser(Uuid::fromString($this->session->get('userId')), [new Author()]);
    }
}