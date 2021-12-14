<?php

namespace App\Http\Controllers\BackEnd\Categories;

use App\Http\Requests\category\CreateCategoryRequest;
use App\Models\Categories\Category;
use App\Repositories\Categories\Contract\CategoryRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    private $category;
    public function __construct(CategoryRepositoryInterface $category)
    {
        $this->category = $category;
    }

    public function index()
    {
        $categories = $this->category->all(['id', 'name', 'slug']);
        $view = view('backend.categories.index');
        $view->with('categories', $categories);
        return $view;
    }

    public function create(CreateCategoryRequest $request)
    {
        $name = $request->name;
        $data = [
            'name' => $name,
            'slug' => create_slug($name)
        ];
        $this->category->create($data);
        return redirect()->route('backend.category')->with('success', 'Thêm danh mục thành công');
    }

}
