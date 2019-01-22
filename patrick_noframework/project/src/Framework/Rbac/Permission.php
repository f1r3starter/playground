<?php
/**
 * Created by PhpStorm.
 * User: andreyfilenko
 * Date: 2019-01-22
 * Time: 23:11
 */

namespace SocialNews\Framework\Rbac;


class Permission
{
    public function equals(Permission $permission): bool
    {
        return get_class() === get_class($permission);
    }
}