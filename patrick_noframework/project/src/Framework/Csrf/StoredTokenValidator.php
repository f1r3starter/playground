<?php
/**
 * Created by PhpStorm.
 * User: andreyfilenko
 * Date: 2019-01-17
 * Time: 23:12
 */

namespace SocialNews\Framework\Csrf;


class StoredTokenValidator
{
    /**
     * @var TokenStorage
     */
    private $tokenStorage;

    public function __construct(TokenStorage $tokenStorage)
    {
        $this->tokenStorage = $tokenStorage;
    }

    public function validate(string $key, Token $token): bool
    {
        $storedToken = $this->tokenStorage->retrieve($key);

        return $storedToken !== null ? $token->equals($storedToken) : false;
    }
}