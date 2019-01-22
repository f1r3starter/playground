<?php
/**
 * Created by PhpStorm.
 * User: andreyfilenko
 * Date: 2019-01-22
 * Time: 23:19
 */

namespace SocialNews\Framework\Rbac;


interface User
{
    public function hasPermissions(Permission $permission): bool;
}