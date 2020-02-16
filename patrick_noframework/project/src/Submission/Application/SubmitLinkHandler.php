<?php
/**
 * Created by PhpStorm.
 * User: andreyfilenko
 * Date: 2019-01-18
 * Time: 22:28
 */

namespace SocialNews\Submission\Application;


use SocialNews\Submission\Domain\Submission;
use SocialNews\Submission\Domain\SubmissionRepository;

class SubmitLinkHandler
{
    /**
     * @var SubmissionRepository
     */
    private $submissionRepository;

    public function __construct(SubmissionRepository $submissionRepository)
    {
        $this->submissionRepository = $submissionRepository;
    }

    public function handle(SubmitLink $command): void
    {
        $submission = Submission::submit(
            $command->getAuthorId(),
            $command->getUrl(),
            $command->getTitle()
        );

        $this->submissionRepository->add($submission);
    }
}
