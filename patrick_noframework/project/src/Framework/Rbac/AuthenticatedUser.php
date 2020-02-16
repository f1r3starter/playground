<?php
/**
 * Created by PhpStorm.
 * User: andreyfilenko
 * Date: 2019-01-22
 * Time: 23:21
 */

namespace SocialNews\Framework\Rbac;


use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;

class AuthenticatedUser implements User
{
    /**
     * @var UuidInterface
     */
    private $id;
    /**
     * @var Role[]
     */
    private $roles;

    public function __construct(UuidInterface $id, array $roles)
    {
        $this->id = $id;
        $this->roles = $roles;
    }

    /**
     * @return Uuid
     */
    public function getId(): UuidInterface
    {
        return $this->id;
    }

    public function hasPermissions(Permission $permission): bool
    {
        foreach ($this->roles as $role) {
            if ($role->hasPermission($permission)) {
                return true;
            }
        }

        return false;
    }
}
