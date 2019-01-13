<?php
/**
 * Created by PhpStorm.
 * User: andreyfilenko
 * Date: 2019-01-13
 * Time: 20:37
 */

namespace SocialNews\Framework\Rendering;


class TemplateDirectory
{
    private $templateDirectory;

    public function __construct(string $rootDirectory)
    {
        $this->templateDirectory = $rootDirectory . '/templates';
    }

    public function toString(): string
    {
        return $this->templateDirectory;
    }
}