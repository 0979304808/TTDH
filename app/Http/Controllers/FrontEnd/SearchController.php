<?php

namespace App\Http\Controllers\FrontEnd;

use App\Models\Categories\Category;
use App\Models\Posts\Post;
use Goutte\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Symfony\Component\DomCrawler\Crawler;

class SearchController extends Controller
{
    const url = 'https://m.baomoi.com/tim-kiem.epi';
    private $client;

    public function __construct()
    {
        $this->client = new Client();
    }

    public function search()
    {
        $data = $this->crawler(self::url);
        $tags = $data->filter('#content-main .tag-item')->each(function ($node) {
            return $node->text();
        });
        $view = view('frontend.search.search');
        $view->with('tags', $tags);
        if ($search = request('q')) {
            $data = $this->crawlerDataSearch(request('q'));
            $posts = Post::where('title', 'like', '%' . $search . '%')->orWhere('description', 'like', '%' . $search . '%')->paginate();
//            foreach ($posts as $post){
//                $data[] = [
//                    'id' => $post->id,
//                    'title' => $post->title,
//                    'slug' => $post->slug,
//                    'image' => $post->image,
//                    'description' => $post->description,
//                    'content' => $post->content,
//                ];
//            }
            $view->with('posts', $posts);
        }
        return $view;
    }

    public function crawler($url)
    {
        $crawler = $this->client->request('GET', $url);
        $response = $this->client->getResponse();
        if ($response->getStatusCode() == 200) {
            return $crawler;
        }
    }

    public function crawlerDataSearch($search)
    {
        $urls = ['https://baomoi.com/tim-kiem/' . $search . '.epi', 'https://timkiem.vnexpress.net/?q=' . $search, 'https://vov.vn/search?keyword=' . $search];
        foreach ($urls as $key => $url) {
            $data = $this->crawler($url);
//            if ($key == 0) {
//                $datas = $this->crawlerBaoMoi($data);
//                dd($datas);
//            }
            if ($key == 1) {
                $datas = $this->crawlerVnexpress($data);
            }
            if ($key == 2) {
                $datas = $this->crawlerVov($data);
            }
        }
        return $datas;
    }

    public function crawlerVov($data)
    {
        $datas = $data->filter('.views-element-container .article-media')->each(function ($node, $i) {
            if ($i < 3){
                $content = $this->get_content_vov($node->filter('a')->attr('href'));
//            if (str_word_count($node->filter('p')->text()) < 255){
                 $data = [
                    'title' => $node->filter('.media-title')->count() ? $node->filter('.media-title')->text() : null,
                    'image' => $node->filter('img')->count() ? $node->filter('img')->attr('src') : null,
                    'description' => $node->filter('p')->count() ? substr($node->filter('p')->text(),0, 50)  : null,
                    'link' => $node->filter('a')->count() ? $node->filter('a')->attr('href') : null,
                    'content' => $content['content'] ?? '',
                    'date' => $content['date'] ?? null,
                    'category' => $content['category'] ?? '',
                    'slug' => create_slug($node->filter('.media-title')->text())
                ];
                if (!Post::where('slug', create_slug($node->filter('.media-title')->text()))->exists()) {
                    $this->save_data($data);
                }
//            }
            }
        });
        return $datas;
    }

    public function get_content_vov($link)
    {
        $url = 'https://vov.vn/';
        $crawl = $this->crawler($url.$link);
        $content = preg_replace("/(\n|\t)/", '', strip_tags($crawl->filter('.article-content')->html(), "<p>,<strong>"));
        $content = preg_replace('(<p class="Image">.+?<\/p>)', '', $content);
        return [
            'content' => $content,
            'category' => $crawl->filter('.breadcrumb-item a')->count() ? $crawl->filter('.breadcrumb-item a')->text() : null,
        ];
    }

    public function crawlerBaoMoi($data)
    {
        $datas = $data->filter('.bm_AN .bm_E')->each(function ($node) {
//            return $node->html();
//            return $node->filter('a')->attr('href');
//            return $node->filter('a')->attr('title');
            return $node->filter('img')->attr('src');
        });
        array_splice($datas, 5);
        return $datas;
    }

    public function crawlerVnexpress($data)
    {
        $datas = $data->filter('.content-search .list-news-subfolder .item-news-common')->each(function ($node, $i) {
            if ($i < 3 ){
                if ($node->filter('.description')->count()) {
                    if ($node->filter('a')->count()) {
                        $details = $this->crawler($node->filter('a')->attr('href'));
                        if ($details) {
                            $content = $this->get_content($details);
                        }
                        $array = [
                            'title' => $node->filter('a')->count() ? $node->filter('a')->attr('title') : null,
                            'image' => $node->filter('img')->count() ? $node->filter('img')->attr('data-src') : null,
                            'description' => $node->filter('.description')->count() ? $node->filter('.description')->text() : null,
                            'link' => $node->filter('a')->count() ? $node->filter('a')->attr('href') : null,
                            'content' => $content['content'] ?? '',
                            'date' => $content['date'] ?? '',
                            'category' => $content['category'] ?? ''
                        ];
                        if (!Post::where('slug', create_slug($node->filter('a')->attr('title')))->exists()) {
                            $this->save_data($array);
                        }
                    }
                }
            }
        });
        return $datas;
    }

    public function get_content($crawl)
    {
        $crawl->filter('ul.list-news')->each(function (Crawler $craw) {
            foreach ($craw as $nodes) {
                $nodes->parentNode->removeChild($nodes);
            }
        });

        $crawl->filter('.description .location-stamp')->each(function (Crawler $craw) {
            foreach ($craw as $nodes) {
                $nodes->parentNode->removeChild($nodes);
            }
        });
        $category = $crawl->filter('.breadcrumb a')->count() ? $crawl->filter('.breadcrumb a')->text() : null;
        $date = $crawl->filter('.date')->count() ? $crawl->filter('.date')->text() : null;
        $data = $crawl->filter('.fck_detail')->count() ? $crawl->filter('.fck_detail')->html() : 'null';

        $content = preg_replace("/(\n|\t)/", '', strip_tags($data, "<p>,<strong>"));
        $content = preg_replace('(<p class="Image">.+?<\/p>)', '', $content);
        $data = ['content' => $content, 'date' => $date, 'category' => $category];
        return $data;
    }

    public function save_data($data)
    {
        \DB::transaction(function () use ($data) {
            if (!empty($data['category'])) {
                $array = [
                    'title' => $data['title'],
                    'user_id' => 1,
                    'slug' => create_slug($data['title']),
                    'description' => $data['description'],
                    'image' => $data['image'],
                    'content' => $data['content'],
                    'type' => 'post',
                    'source' => 'Vnexpress',
                    'created_date' => $data['date']
                ];
                if (!Category::where('slug', create_slug($data['category']))->exists()) {
                    Category::create([
                        'name' => $data['category'],
                        'slug' => create_slug($data['category'])
                    ]);
                }
                $category = Category::where('slug', create_slug($data['category']))->first();
                $post = Post::create($array);
                $post->categories()->attach($category->id);
            }
        });
    }

}
// test
