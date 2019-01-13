<?php
/**
 * Created by PhpStorm.
 * User: andreyfilenko
 * Date: 2019-01-06
 * Time: 21:54
 */
declare(strict_types = 1);

namespace SocialNews\FrontPage\Presentation;

use SocialNews\Framework\Rendering\TemplateRenderer;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class FrontPageController
{
    /**
     * @var TemplateRenderer
     */
    private $templateRenderer;

    public function __construct(TemplateRenderer $templateRenderer)
    {
        $this->templateRenderer = $templateRenderer;
    }

    public function show(Request $request)
    {
        $response = $this->templateRenderer->render('FrontPage.html.twig');
        return new Response($response);
    }
}