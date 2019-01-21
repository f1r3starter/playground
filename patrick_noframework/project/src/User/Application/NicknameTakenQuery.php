<?php
/**
 * Created by PhpStorm.
 * User: andreyfilenko
 * Date: 2019-01-21
 * Time: 21:37
 */

namespace SocialNews\User\Application;


interface NicknameTakenQuery
{
    public function execute(string $nickname): bool;
}