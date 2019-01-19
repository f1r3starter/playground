<?php
/**
 * Created by PhpStorm.
 * User: andreyfilenko
 * Date: 2019-01-19
 * Time: 23:41
 */

namespace SocialNews\User\Presentation;


use SocialNews\Framework\Rendering\TemplateRenderer;
use Symfony\Component\HttpFoundation\Response;

class RegistrationController
{
    /**
     * @var TemplateRenderer
     */
    private $templateRenderer;

    public function __construct(TemplateRenderer $templateRenderer)
    {
        $this->templateRenderer = $templateRenderer;
    }

    public function show(): Response
    {
        $content = $this->templateRenderer->render('Registration.html.twig');
        return new Response($content);
    }
}