<?php
/**
 * Created by PhpStorm.
 * User: andreyfilenko
 * Date: 2019-01-20
 * Time: 00:54
 */

namespace SocialNews\User\Presentation;


use SocialNews\Framework\Csrf\StoredTokenValidator;
use Symfony\Component\HttpFoundation\Request;

class RegistrationUserFormFactory
{
    /**
     * @var StoredTokenValidator
     */
    private $storedTokenValidator;

    public function __construct(StoredTokenValidator $storedTokenValidator)
    {

        $this->storedTokenValidator = $storedTokenValidator;
    }

    public function createFromRequest(Request $request): RegistrationUserForm
    {
        return new RegistrationUserForm(
            $this->storedTokenValidator,
            $request->get('token'),
            $request->get('nickname'),
            $request->get('password')
        );
    }
}