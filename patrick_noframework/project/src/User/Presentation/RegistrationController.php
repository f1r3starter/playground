<?php
/**
 * Created by PhpStorm.
 * User: andreyfilenko
 * Date: 2019-01-19
 * Time: 23:41
 */

namespace SocialNews\User\Presentation;


use SocialNews\Framework\Rendering\TemplateRenderer;
use SocialNews\User\Application\RegisterUserHandler;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class RegistrationController
{
    /**
     * @var TemplateRenderer
     */
    private $templateRenderer;
    /**
     * @var RegistrationUserFormFactory
     */
    private $formFactory;
    /**
     * @var SessionInterface
     */
    private $session;
    /**
     * @var RegisterUserHandler
     */
    private $registerUserHandler;

    public function __construct(TemplateRenderer $templateRenderer, RegistrationUserFormFactory $formFactory, Session $session, RegisterUserHandler $registerUserHandler)
    {
        $this->templateRenderer = $templateRenderer;
        $this->formFactory = $formFactory;
        $this->session = $session;
        $this->registerUserHandler = $registerUserHandler;
    }

    public function show(): Response
    {
        $content = $this->templateRenderer->render('Registration.html.twig');
        return new Response($content);
    }

    public function register(Request $request)
    {
        $response = new RedirectResponse('/register');
        $registrationForm = $this->formFactory->createFromRequest($request);
        if ($registrationForm->hasValidationErrors()) {
            foreach ($registrationForm->getValidationErrors() as $error) {
                $this->session->getFlashBag()->add('errors', $error);
            }
            return $response;
        }
        $this->registerUserHandler->handle($registrationForm->toCommand());
        $this->session->getFlashBag()->add('success', 'Successfully registered');

        return $response;
    }
}