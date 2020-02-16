<?php

declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: andreyfilenko
 * Date: 2019-01-07
 * Time: 19:51
 */

namespace SocialNews\Framework\Rendering;


use Twig_Environment;

class TwigTemplateRenderer implements TemplateRenderer
{
    /**
     * @var Twig_Environment
     */
    private $twigEnvironment;

    public function __construct(Twig_Environment $twigEnvironment)
    {
        $this->twigEnvironment = $twigEnvironment;
    }

    public function render(string $template, array $data = []): string
    {
        return $this->twigEnvironment->render($template, $data);
    }
}
