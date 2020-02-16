<?php
/**
 * Created by PhpStorm.
 * User: andreyfilenko
 * Date: 2019-01-17
 * Time: 23:02
 */

namespace SocialNews\Framework\Csrf;


class StoredTokenReader
{
    /**
     * @var TokenStorage
     */
    private $tokenStorage;

    public function __construct(TokenStorage $tokenStorage)
    {
        $this->tokenStorage = $tokenStorage;
    }

    public function read(string $key): Token
    {
        $token = $this->tokenStorage->retrieve($key);

        if (null !== $token) {
            return $token;
        }

        $newToken = Token::generate();
        $this->tokenStorage->store($key, $newToken);

        return $newToken;
    }
}
