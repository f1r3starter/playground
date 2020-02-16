<?php
/**
 * Created by PhpStorm.
 * User: andreyfilenko
 * Date: 2019-01-21
 * Time: 22:09
 */

namespace SocialNews\User\Application;


class LogIn
{
    /**
     * @var string
     */
    private $nickname;
    /**
     * @var string
     */
    private $password;

    public function __construct(string $nickname, string $password)
    {
        $this->nickname = $nickname;
        $this->password = $password;
    }

    /**
     * @return string
     */
    public function getNickname(): string
    {
        return $this->nickname;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }
}
