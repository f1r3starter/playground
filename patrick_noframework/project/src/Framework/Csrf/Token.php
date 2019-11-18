<?php
/**
 * Created by PhpStorm.
 * User: andreyfilenko
 * Date: 2019-01-17
 * Time: 22:54
 */

namespace SocialNews\Framework\Csrf;

class Token
{
    /**
     * @var string
     */
    private $token;

    public function __construct(string $token)
    {

        $this->token = $token;
    }

    public static function generate(): self
    {
        return new self(bin2hex(random_bytes(256)));
    }

    public function equals(Token $token): bool
    {
        return $this->token === $token->toString();
    }

    /**
     * @return string
     */
    public function toString(): string
    {
        return $this->token;
    }
}
