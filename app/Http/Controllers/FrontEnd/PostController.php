<?php

namespace App\Http\Controllers\FrontEnd;

use App\Models\Posts\Post;
use App\Repositories\Posts\Contract\PostRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{

    public function index()
    {

    }

    public function detail($slug)
    {
        $post = Post::with('categories')->whereSlug($slug)->first();
        $slug = ($post->categories)[0]->slug;
        $listPost = Post::with('categories')->whereHas('categories', function ($query) use ($slug) {
            $query->where('slug', $slug);
        })->where('id', "!=",$post->id)->inRandomOrder()->limit(3)->get();
        $view = view('frontend.post.detail');
        $view->with('post', $post);
        $view->with('listPost', $listPost);
        return $view;
    }
}
