<?php
declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: andreyfilenko
 * Date: 2019-01-07
 * Time: 19:56
 */

namespace SocialNews\Framework\Rendering;


use SocialNews\Framework\Csrf\StoredTokenReader;
use Symfony\Component\HttpFoundation\Session\Flash\FlashBagInterface;
use Symfony\Component\HttpFoundation\Session\Session;
use Twig_Environment;
use Twig_Function;
use Twig_Loader_Filesystem;

class TwigTemplateRendererFactory
{
    private $templateDirectory;
    /**
     * @var StoredTokenReader
     */
    private $storedTokenReader;
    /**
     * @var Session
     */
    private $session;

    public function __construct(TemplateDirectory $templateDirectory, StoredTokenReader $storedTokenReader, Session $session)
    {
        $this->templateDirectory = $templateDirectory;
        $this->storedTokenReader = $storedTokenReader;
        $this->session = $session;
    }

    public function create(): TwigTemplateRenderer
    {
        $templateDirectory = $this->templateDirectory->toString();
        $loader = new Twig_Loader_Filesystem([$templateDirectory]);
        $twigEnvironment = new Twig_Environment($loader);
        $twigEnvironment->addFunction(
            new Twig_Function(
                'get_token',
                function (string $key): string {
                    return $this->storedTokenReader->read($key)->toString();
                }
            )
        );

        $twigEnvironment->addFunction(
            new Twig_Function(
                'get_flash_bag',
                function (): FlashBagInterface {
                    return $this->session->getFlashBag();
                }
            )
        );

        return new TwigTemplateRenderer($twigEnvironment);
    }
}
