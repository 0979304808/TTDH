<?php

namespace App\Http\Controllers\FrontEnd;

use App\Models\Categories\Category;
use App\Models\Posts\Post;
use App\Repositories\Posts\Contract\PostRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{

    public function index($slug)
    {
        $category = Category::where('slug', $slug)->first();
        $posts = Post::whereHas('categories', function ($query) use ($slug){
            $query->where('slug', $slug);
        })->latest()->paginate();
        $categories = Category::with('posts')->where('slug', '!=', $slug)->whereHas('posts')->inRandomOrder()->limit(3)->latest()->get();
        $view = view('frontend.post.listPost');
        $view->with('category',$category);
        $view->with('posts',$posts);
        $view->with('categories',$categories);
        return $view;
    }

    public function detail($slug)
    {
        $post = Post::with(['categories','comments' => function($query){
            $query->whereStatus(1)->latest();
        }, 'user'])->whereSlug($slug)->first();
        $slug = ($post->categories)[0]->slug;
        $listPost = Post::with('categories')->whereHas('categories', function ($query) use ($slug) {
            $query->where('slug', $slug);
        })->where('id', "!=",$post->id)->inRandomOrder()->limit(3)->get();
        \JavaScript::put([
            'link_create_comment' => route('frontend.comments.create')
        ]);
        $view = view('frontend.post.detail');
        $view->with('post', $post);
        $view->with('listPost', $listPost);
        return $view;
    }
}
