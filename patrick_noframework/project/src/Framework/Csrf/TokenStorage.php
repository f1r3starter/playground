<?php
/**
 * Created by PhpStorm.
 * User: andreyfilenko
 * Date: 2019-01-17
 * Time: 22:56
 */

namespace SocialNews\Framework\Csrf;

interface TokenStorage
{
    public function store(string $key, Token $token): void;

    public function retrieve(string $key): ?Token;
}