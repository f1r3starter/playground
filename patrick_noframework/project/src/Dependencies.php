<?php

declare(strict_types=1);

use Auryn\Injector;
use Doctrine\DBAL\Connection;
use SocialNews\Framework\Csrf\SymfonySessionTokenStorage;
use SocialNews\Framework\Csrf\TokenStorage;
use SocialNews\Framework\Dbal\ConnectionFactory;
use SocialNews\Framework\Dbal\DatabaseUrl;
use SocialNews\Framework\Rbac\SymfonySessionCurrentUserFactory;
use SocialNews\Framework\Rbac\User;
use SocialNews\Framework\Rendering\TemplateDirectory;
use SocialNews\Framework\Rendering\TemplateRenderer;
use SocialNews\Framework\Rendering\TwigTemplateRendererFactory;
use SocialNews\FrontPage\Application\SubmissionQuery;
use SocialNews\FrontPage\Infrastructure\DbalSubmissionQuery;
use SocialNews\Submission\Domain\SubmissionRepository;
use SocialNews\Submission\Infrastructure\DbalSubmissionRepository;
use SocialNews\User\Application\NicknameTakenQuery;
use SocialNews\User\Domain\UserRepository;
use SocialNews\User\Infrastructure\DbalNicknameTakenQuery;
use SocialNews\User\Infrastructure\DbalUserRepository;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

$injector = new Injector();

$injector->delegate(
    TemplateRenderer::class,
    function () use ($injector): TemplateRenderer {
        $factory = $injector->make(TwigTemplateRendererFactory::class);
        return $factory->create();
    }
);

$injector->alias(SubmissionQuery::class, DbalSubmissionQuery::class);
$injector->alias(TokenStorage::class, SymfonySessionTokenStorage::class);
$injector->alias(SessionInterface::class, Session::class);
$injector->alias(SubmissionRepository::class, DbalSubmissionRepository::class);
$injector->alias(UserRepository::class, DbalUserRepository::class);
$injector->alias(NicknameTakenQuery::class, DbalNicknameTakenQuery::class);
$injector->share(SubmissionQuery::class);

$injector->define(TemplateDirectory::class, [':rootDirectory' => ROOTDIR]);

$injector->define(
    DatabaseUrl::class,
    [':url' => 'sqlite:///' . ROOTDIR . '/storage/db.sqlite3']
);

$injector->delegate(Connection::class, function () use ($injector): Connection {
    $factory = $injector->make(ConnectionFactory::class);
    return $factory->create();
});

$injector->delegate(User::class, function () use ($injector): User {
    $factory = $injector->make(SymfonySessionCurrentUserFactory::class);
    return $factory->create();
});

$injector->share(Connection::class);

return $injector;
