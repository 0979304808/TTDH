<?php

namespace App\Http\Controllers\FrontEnd;

use App\Models\Posts\Post;
use Goutte\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SearchController extends Controller
{
    const url = 'https://m.baomoi.com/tim-kiem.epi';
    private $client;
    public function __construct()
    {
        $this->client = new Client();
    }

    public function search(){
        $data = $this->crawler(self::url);
        $tags = $data->filter('.bm_II .tag-item')->each(function ($node){
            return $node->text();
        });
        $view = view('frontend.search.search');
        $view->with('tags', $tags);
        if ($search = request('q')){
            $posts = Post::where('title','like','%'.$search.'%')->where('description','like','%'.$search.'%')->get();
            $view->with('posts', $posts);
        }
        return $view;
    }

    public function crawler($url){
        $crawler = $this->client->request('GET', $url);
        $response = $this->client->getResponse();
        if ($response->getStatusCode() == 200) {
            return $crawler;
        }
    }
}
