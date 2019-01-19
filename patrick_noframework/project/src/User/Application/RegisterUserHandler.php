<?php
/**
 * Created by PhpStorm.
 * User: andreyfilenko
 * Date: 2019-01-19
 * Time: 23:37
 */

namespace SocialNews\User\Application;


use SocialNews\User\Domain\User;
use SocialNews\User\Domain\UserRepository;

class RegisterUserHandler
{
    /**
     * @var UserRepository
     */
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function handle(RegisterUser $command): void
    {
        $user = User::register(
            $command->getNickname(),
            $command->getPassword()
        );

        $this->userRepository->add($user);
    }
}