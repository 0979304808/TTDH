<?php

namespace App\Repositories\Permissions;

use App\Core\Repositories\BaseRepository;
use App\Models\Permissions\Permission;
use App\Repositories\Permissions\Contract\PermissionRepositoryInterface;

class PermissionRepository extends BaseRepository implements PermissionRepositoryInterface
{
    protected $model;

    public function __construct(Permission $permission)
    {
        parent::__construct($permission);
        $this->model = $permission;
    }

}
