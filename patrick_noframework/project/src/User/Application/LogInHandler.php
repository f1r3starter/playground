<?php
/**
 * Created by PhpStorm.
 * User: andreyfilenko
 * Date: 2019-01-21
 * Time: 22:11
 */

namespace SocialNews\User\Application;


use SocialNews\User\Domain\UserRepository;

class LogInHandler
{
    /**
     * @var UserRepository
     */
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function handle(LogIn $command): void
    {
        $user = $this->userRepository->findByNickname($command->getNickname());

        if ($user === null) {
            return;
        }

        $user->login($command->getPassword());

        $this->userRepository->save($user);
    }
}