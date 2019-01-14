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
use SocialNews\FrontPage\Application\SubmissionQuery;
use Symfony\Component\HttpFoundation\Response;

class FrontPageController
{
    /**
     * @var TemplateRenderer
     */
    private $templateRenderer;

    private $submissionQuery;

    public function __construct(TemplateRenderer $templateRenderer, SubmissionQuery $submissionQuery)
    {
        $this->templateRenderer = $templateRenderer;
        $this->submissionQuery = $submissionQuery;
    }

    public function show()
    {
        $response = $this->templateRenderer->render('FrontPage.html.twig', [
            'submissions' => $this->submissionQuery->execute()
        ]);
        return new Response($response);
    }
}