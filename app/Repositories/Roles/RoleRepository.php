<?php

namespace App\Repositories\Roles;

use App\Core\Repositories\BaseRepository;
use App\Models\Roles\Role;
use App\Repositories\Roles\Contract\RoleRepositoryInterface;

class RoleRepository extends BaseRepository implements RoleRepositoryInterface
{
    protected $model;

    public function __construct(Role $role)
    {
        parent::__construct($role);
        $this->model = $role;
    }
    public function WithPermissions()
    {
        return $this->model->with('permissions')->latest()->paginate();
    }
}
