<?php

namespace App\Repositories\Categories;

use App\Core\Repositories\BaseRepository;
use App\Models\Categories\Category;
use App\Repositories\Categories\Contract\CategoryRepositoryInterface;

class CategoryRepository extends BaseRepository implements CategoryRepositoryInterface
{
    protected $model;

    public function __construct(Category $category)
    {
        parent::__construct($category);
        $this->model = $category;
    }
}
