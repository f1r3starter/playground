<?php
/**
 * Created by PhpStorm.
 * User: andreyfilenko
 * Date: 2019-01-22
 * Time: 23:20
 */

namespace SocialNews\Framework\Rbac;


class Guest implements User
{
    public function hasPermissions(Permission $permission): bool
    {
        return false;
    }
}