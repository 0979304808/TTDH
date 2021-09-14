<?php

namespace App\Repositories\Roles\Contract;

use App\Core\Repositories\Contract\BaseRepositoryInterface;

interface RoleRepositoryInterface extends BaseRepositoryInterface
{
    public function WithPermissions();
}
