<?php

namespace App\Http\Controllers\FrontEnd;

use App\Models\Categories\Category;
use App\Models\Posts\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $highlights = Post::orderByDesc('view')->paginate(4);

        $posts_new = Post::latest()->limit(5)->get();
        $id = Post::latest()->limit(5)->pluck('id');

        $banner = Post::where('type', 'post')->whereHas('categories',function ($query){
            $query->orderBy('post_category.created_at', 'ASC');
            $query->where('slug', 'noi-bat');
        })->latest()->limit(3)->get();
        $post_category = Category::with(['posts' => function($query){
            $query->latest();
        }])->where('slug','!=', 'noi-bat')->get();

        $relate = Post::inRandomOrder()->limit(4)->get();



        $listPostComment = Post::with('comments')->withCount(['comments' => function($query){
            $query->whereStatus(1);
        }])->orderBy('comments_count', 'DESC')->limit(5)->get();

        $listPostLike = Post::orderBy('like', 'desc')->limit(5)->get(); ;

        $view = view('frontend.home.index');
        $view->with('highlights', $highlights);
        $view->with('post_category', $post_category);
        $view->with('posts_new', $posts_new);
        $view->with('banner', $banner);
        $view->with('relate', $relate);
        $view->with('listPostLike', $listPostLike);
        $view->with('listPostComment', $listPostComment);
        return $view;
    }
}
