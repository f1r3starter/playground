<?php
declare(strict_types = 1);
/**
 * Created by PhpStorm.
 * User: andreyfilenko
 * Date: 2019-01-07
 * Time: 19:56
 */

namespace SocialNews\Framework\Rendering;


class TwigTemplateRendererFactory
{
    private $templateDirectory;

    public function __construct(TemplateDirectory $templateDirectory)
    {
        $this->templateDirectory = $templateDirectory;
    }

    public function create(): TwigTemplateRenderer
    {
        $templateDirectory = $this->templateDirectory->toString();
        $loader = new \Twig_Loader_Filesystem([$templateDirectory]);
        $twigEnvironment = new \Twig_Environment($loader);
        return new TwigTemplateRenderer($twigEnvironment);
    }
}