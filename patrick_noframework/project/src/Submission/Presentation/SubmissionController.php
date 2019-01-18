<?php
/**
 * Created by PhpStorm.
 * User: andreyfilenko
 * Date: 2019-01-06
 * Time: 22:03
 */

namespace SocialNews\Submission\Presentation;


use SocialNews\Framework\Rendering\TemplateRenderer;
use SocialNews\Submission\Application\SubmitLinkHandler;
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
     * @var Session
     */
    private $session;
    /**
     * @var SubmitLinkHandler
     */
    private $submitLinkHandler;
    /**
     * @var SubmissionFormFactory
     */
    private $submissionFormFactory;

    public function __construct(TemplateRenderer $templateRenderer, SubmissionFormFactory $submissionFormFactory, Session $session, SubmitLinkHandler $submitLinkHandler)
    {

        $this->templateRenderer = $templateRenderer;
        $this->session = $session;
        $this->submitLinkHandler = $submitLinkHandler;
        $this->submissionFormFactory = $submissionFormFactory;
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
        $form = $this->submissionFormFactory->createFromRequest($request);
        if ($form->hasValidationErrors()) {
            foreach ($form->getValidationErrors() as $error) {
                $this->session->getFlashBag()->add('errors', $error);
            }

            return $response;
        }
        $this->submitLinkHandler->handle($form->toCommand());
        $this->session->getFlashBag()->add(
            'success',
            'Your url was submitted successfully'
        );

        return $response;
    }
}