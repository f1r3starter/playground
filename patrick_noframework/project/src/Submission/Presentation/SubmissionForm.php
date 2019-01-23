<?php
/**
 * Created by PhpStorm.
 * User: andreyfilenko
 * Date: 2019-01-18
 * Time: 22:40
 */

namespace SocialNews\Submission\Presentation;


use SocialNews\Framework\Csrf\StoredTokenValidator;
use SocialNews\Framework\Csrf\Token;
use SocialNews\Framework\Rbac\AuthenticatedUser;
use SocialNews\Submission\Application\SubmitLink;

class SubmissionForm
{
    /**
     * @var StoredTokenValidator
     */
    private $tokenValidator;
    /**
     * @var string
     */
    private $token;
    /**
     * @var string
     */
    private $title;
    /**
     * @var string
     */
    private $url;

    public function __construct(StoredTokenValidator $tokenValidator, string $token, string $title, string $url)
    {
        $this->tokenValidator = $tokenValidator;
        $this->token = $token;
        $this->title = $title;
        $this->url = $url;
    }

    public function getValidationErrors(): array
    {
        $errors = [];

        if (!$this->tokenValidator->validate(
            'submission',
            new Token($this->token)
        )) {
            $errors[] = 'Invalid token';
        }

        if (strlen($this->url) < 1 || strlen($this->url) > 200) {
            $errors[] = 'URL must be between 1 and 200 characters long';
        }

        if (strlen($this->title) < 1 || strlen($this->title) > 200) {
            $errors[] = 'Title must be between 1 and 200 characters long';
        }

        return $errors;
    }

    public function hasValidationErrors(): bool
    {
        return !empty($this->getValidationErrors());
    }

    public function toCommand(AuthenticatedUser $user): SubmitLink
    {
        return new SubmitLink($user->getId(), $this->url, $this->title);
    }
}