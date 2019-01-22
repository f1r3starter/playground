<?php
/**
 * Created by PhpStorm.
 * User: andreyfilenko
 * Date: 2019-01-22
 * Time: 23:14
 */

namespace SocialNews\Framework\Rbac;


abstract class Role
{
    public function hasPermission(Permission $permission): bool
    {
        return in_array($permission, $this->getPermissions());
    }

    abstract protected function getPermissions(): array;
}