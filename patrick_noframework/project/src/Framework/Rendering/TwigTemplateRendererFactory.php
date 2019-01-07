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
    public function create(): TwigTemplateRenderer
    {
        $loader = new \Twig_Loader_Filesystem([]);
        $twigEnvironment = new \Twig_Environment($loader);
        return new TwigTemplateRenderer($twigEnvironment);
    }
}