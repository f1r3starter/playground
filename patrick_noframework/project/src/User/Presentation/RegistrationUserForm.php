<?php
/**
 * Created by PhpStorm.
 * User: andreyfilenko
 * Date: 2019-01-20
 * Time: 00:41
 */

namespace SocialNews\User\Presentation;


use SocialNews\Framework\Csrf\StoredTokenValidator;
use SocialNews\Framework\Csrf\Token;
use SocialNews\User\Application\NicknameTakenQuery;
use SocialNews\User\Application\RegisterUser;

class RegistrationUserForm
{
    /**
     * @var StoredTokenValidator
     */
    private $storedTokenValidator;
    /**
     * @var string
     */
    private $token;
    /**
     * @var string
     */
    private $nickname;
    /**
     * @var string
     */
    private $password;
    /**
     * @var NicknameTakenQuery
     */
    private $nicknameTakenQuery;

    public function __construct(NicknameTakenQuery $nicknameTakenQuery, StoredTokenValidator $storedTokenValidator, string $token, string $nickname, string $password)
    {
        $this->storedTokenValidator = $storedTokenValidator;
        $this->token = $token;
        $this->nickname = $nickname;
        $this->password = $password;
        $this->nicknameTakenQuery = $nicknameTakenQuery;
    }

    public function hasValidationErrors(): bool
    {
        return !empty($this->getValidationErrors());
    }

    public function getValidationErrors(): array
    {
        $errors = [];

        if (!$this->storedTokenValidator->validate(
            'registration',
            new Token($this->token)
        )) {
            $errors[] = 'Invalid token';
        }

        if ($this->nicknameTakenQuery->execute($this->nickname)) {
            $errors[] = 'Nickname has been already taken';
        }

        if (strlen($this->nickname) < 3 || strlen($this->nickname) > 20) {
            $errors[] = 'Nickname must be between 3 and 20 characters';
        }

        if (!ctype_alnum($this->nickname)) {
            $errors[] = 'Nickname must be letters and numbers';
        }

        if (strlen($this->password) < 8) {
            $errors[] = 'Password should be at lesast 8 characters long';
        }

        return $errors;
    }

    public function toCommand(): RegisterUser
    {
        return new RegisterUser($this->nickname, $this->password);
    }
}
