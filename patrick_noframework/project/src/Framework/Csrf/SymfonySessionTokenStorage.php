<?php

namespace SocialNews\Framework\Csrf;

use Symfony\Component\HttpFoundation\Session\SessionInterface;

class SymfonySessionTokenStorage implements TokenStorage
{
    /**
     * @var SessionInterface
     */
    private $session;

    public function __construct(SessionInterface $session)
    {

        $this->session = $session;
    }

    public function store(string $key, Token $token): void
    {
        $this->session->set($key, $token->toString());
    }

    public function retrieve(string $key): ?Token
    {
        $tokenValue = $this->session->get($key);

        if (null === $tokenValue) {
            return null;
        }

        return new Token($tokenValue);
    }
}