<?php

namespace App\Repositories\Comments\Contract;

use App\Core\Repositories\Contract\BaseRepositoryInterface;

interface CommentRepositoryInterface extends BaseRepositoryInterface
{

    public function fisrtAll(array $attributes);
}
