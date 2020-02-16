<?php
/**
 * Created by PhpStorm.
 * User: andreyfilenko
 * Date: 2019-01-20
 * Time: 00:54
 */

namespace SocialNews\User\Presentation;


use SocialNews\Framework\Csrf\StoredTokenValidator;
use SocialNews\User\Application\NicknameTakenQuery;
use Symfony\Component\HttpFoundation\Request;

class RegistrationUserFormFactory
{
    /**
     * @var StoredTokenValidator
     */
    private $storedTokenValidator;
    /**
     * @var NicknameTakenQuery
     */
    private $nicknameTakenQuery;

    public function __construct(StoredTokenValidator $storedTokenValidator, NicknameTakenQuery $nicknameTakenQuery)
    {
        $this->storedTokenValidator = $storedTokenValidator;
        $this->nicknameTakenQuery = $nicknameTakenQuery;
    }

    public function createFromRequest(Request $request): RegistrationUserForm
    {
        return new RegistrationUserForm(
            $this->nicknameTakenQuery,
            $this->storedTokenValidator,
            $request->get('token'),
            $request->get('nickname'),
            $request->get('password')
        );
    }
}
