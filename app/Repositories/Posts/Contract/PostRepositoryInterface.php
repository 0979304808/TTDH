<?php

namespace App\Repositories\Posts\Contract;

use App\Core\Repositories\Contract\BaseRepositoryInterface;

interface PostRepositoryInterface extends BaseRepositoryInterface
{
    public function whereCatAuthor($category, $author);

    public function whereSlugPost($slug);

    public function searchAll($search);

    public function ListPost($id);
}
