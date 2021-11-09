<?php

namespace App\Http\Controllers\FrontEnd;

use App\Models\Posts\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $highlights = Post::orderByDesc('view')->paginate(4);
        $posts = Post::orderByDesc('created_at')->paginate(5);
        $banner = Post::where('type', 'post')->orderByDesc('created_at')->first();


        $view = view('frontend.home.index');
        $view->with('highlights', $highlights);
        $view->with('posts', $posts);
        $view->with('banner', $banner);
        return $view;
    }
}
