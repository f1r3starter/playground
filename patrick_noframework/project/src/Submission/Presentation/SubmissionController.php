<?php
/**
 * Created by PhpStorm.
 * User: andreyfilenko
 * Date: 2019-01-06
 * Time: 22:03
 */

namespace SocialNews\Submission\Presentation;


use SocialNews\Framework\Csrf\StoredTokenValidator;
use SocialNews\Framework\Csrf\Token;
use SocialNews\Framework\Rendering\TemplateRenderer;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;

class SubmissionController
{
    /**
     * @var TemplateRenderer
     */
    private $templateRenderer;
    /**
     * @var StoredTokenValidator
     */
    private $storedTokenValidator;
    /**
     * @var Session
     */
    private $session;

    public function __construct(TemplateRenderer $templateRenderer, StoredTokenValidator $storedTokenValidator, Session $session)
    {

        $this->templateRenderer = $templateRenderer;
        $this->storedTokenValidator = $storedTokenValidator;
        $this->session = $session;
    }
    
    public function show()
    {
        $content = $this->templateRenderer->render('Submission.html.twig');
        return new Response(
            $content
        );
    }

    public function submit(Request $request): Response
    {
        $response = new RedirectResponse('/submit');

        if (!$this->storedTokenValidator->validate(
            'submission',
            new Token((string)$request->get('token'))
        )) {
            $this->session->getFlashBag()->add('errors', 'Invalid token');
            return $response;
        }

        $this->session->getFlashBag()->add('success', 'Your url was submitted successfully');

        return $response;
    }
}