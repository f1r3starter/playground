<?php

declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: andreyfilenko
 * Date: 2019-01-07
 * Time: 19:42
 */

namespace SocialNews\Framework\Rendering;


interface TemplateRenderer
{
    public function render(string $template, array $data = []): string;
}
