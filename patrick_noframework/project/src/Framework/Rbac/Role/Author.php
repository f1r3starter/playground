<?php
/**
 * Created by PhpStorm.
 * User: andreyfilenko
 * Date: 2019-01-22
 * Time: 23:17
 */

namespace SocialNews\Framework\Rbac\Role;


use SocialNews\Framework\Rbac\Permission\SubmitLink;
use SocialNews\Framework\Rbac\Role;

class Author extends Role
{
    protected function getPermissions(): array
    {
        return [
            new SubmitLink(),
        ];
    }
}