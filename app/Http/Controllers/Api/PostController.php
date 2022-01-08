<?php

namespace App\Http\Controllers\Api;

use App\Core\Traits\ApiResponser;
use App\Repositories\Categories\CategoryRepository;
use App\Repositories\Posts\Contract\PostRepositoryInterface;
use App\Repositories\Users\Contract\UserRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    use ApiResponser;

    private $post, $category, $user;
    public function __construct(PostRepositoryInterface $post, CategoryRepository $category, UserRepositoryInterface $user)
    {
        $this->post = $post;
        $this->category = $category;
        $this->user = $user;
    }
    public function list()
    {
        $posts = $this->post->all(['id', 'title', 'description', 'image']);
        return $this->success($posts,'200');
    }
}
