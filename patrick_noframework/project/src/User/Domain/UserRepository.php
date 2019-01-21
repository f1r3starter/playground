<?php
/**
 * Created by PhpStorm.
 * User: andreyfilenko
 * Date: 2019-01-19
 * Time: 23:34
 */

namespace SocialNews\User\Domain;


interface UserRepository
{
    public function add(User $user): void;

    public function save(User $user): void;

    public function findByNickname(string $nickname): ?User;
}