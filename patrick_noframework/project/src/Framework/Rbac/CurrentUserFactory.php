<?php
/**
 * Created by PhpStorm.
 * User: andreyfilenko
 * Date: 2019-01-22
 * Time: 23:25
 */

namespace SocialNews\Framework\Rbac;


interface CurrentUserFactory
{
    public function create(): User;
}