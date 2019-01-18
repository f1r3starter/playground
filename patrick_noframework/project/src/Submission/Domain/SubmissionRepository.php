<?php
/**
 * Created by PhpStorm.
 * User: andreyfilenko
 * Date: 2019-01-18
 * Time: 22:25
 */

namespace SocialNews\Submission\Domain;


interface SubmissionRepository
{
    public function add(Submission $submission): void;
}