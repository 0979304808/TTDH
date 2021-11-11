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
        $posts_new = Post::orderByDesc('created_at')->limit(5)->get();
        $banner = Post::where('type', 'post')->whereHas('categories',function ($query){
            $query->where('slug', 'noi-bat');
        })->orderByDesc('created_at')->first();
        $categories = Category::where('slug','!=', 'noi-bat')->get();
        $view = view('frontend.home.index');
        $view->with('highlights', $highlights);
        $view->with('categories', $categories);
        $view->with('posts_new', $posts_new);
        $view->with('banner', $banner);
        return $view;
    }
}
