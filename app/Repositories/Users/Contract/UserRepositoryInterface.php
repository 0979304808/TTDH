<?php

namespace App\Repositories\Users\Contract;

use App\Core\Repositories\Contract\BaseRepositoryInterface;

interface UserRepositoryInterface extends BaseRepositoryInterface
{
    public function updateImage($file, $id);

    public function WithRolePermissions();

    public function ListAdmin();

    public function whereActive($active);

    public function Search($search);
}
