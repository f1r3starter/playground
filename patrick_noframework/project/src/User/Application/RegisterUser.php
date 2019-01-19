<?php
/**
 * Created by PhpStorm.
 * User: andreyfilenko
 * Date: 2019-01-19
 * Time: 23:36
 */

namespace SocialNews\User\Application;


class RegisterUser
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