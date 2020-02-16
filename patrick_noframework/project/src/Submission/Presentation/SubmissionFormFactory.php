<?php
/**
 * Created by PhpStorm.
 * User: andreyfilenko
 * Date: 2019-01-18
 * Time: 22:47
 */

namespace SocialNews\Submission\Presentation;


use SocialNews\Framework\Csrf\StoredTokenValidator;
use Symfony\Component\HttpFoundation\Request;

class SubmissionFormFactory
{
    /**
     * @var StoredTokenValidator
     */
    private $storedTokenValidator;

    public function __construct(StoredTokenValidator $storedTokenValidator)
    {
        $this->storedTokenValidator = $storedTokenValidator;
    }

    public function createFromRequest(Request $request): SubmissionForm
    {
        return new SubmissionForm(
            $this->storedTokenValidator,
            $request->get('token'),
            $request->get('title'),
            $request->get('url')
        );
    }
}
