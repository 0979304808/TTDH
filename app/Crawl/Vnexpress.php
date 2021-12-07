<?php 
namespace App\Crawl;
use Goutte\Client;
use Symfony\Component\DomCrawler\Crawler;
use App\Models\Posts\Post;
use App\Models\Categories\Category;
use DB;
class Vnexpress {
    const url = 'https://vnexpress.net';
    const urli = 'https://vnexpress.net/doi-song';
    private $client;
    public function __construct()
    {
        $this->client = new Client();
    }

    public function scrape()
    {
        // echo Carbon::now('Asia/Ho_Chi_Minh') . "\n";
        // echo 'Xin chờ chút nhé ...' . "\n";
        $crawler = $this->get_content_html(self::urli);
        if ($crawler !== false) {
            $this->get_list_url_category($crawler);
        } else {
            $this->output->writeln("Cannot get news");
        }
    }

    private function get_content_html($url)
    {
        $crawler = $this->client->request('GET', $url);
        $response = $this->client->getResponse();
        if ($response->getStatusCode() == 200) {
            return $crawler;
        }
        return false;
    }

    private function get_list_url_category($crawler)
    {
        $crawler->filter('.top-header-folder ul li')->each(function ($node) {
            $crawler =  $node->filter('a')->attr('href');
            $category =  $node->filter('a')->text();
            if($category != 'Cooking' || $category != null){
                $this->get_list_post($crawler, $category);
            }
        });
    }

    private function get_list_title($crawler)
    {
        $total = 0;
        try {
            $crawler->filter('.col-left-subfolder .item-news-common ')->each(function ($node) {
                echo $node->filter('.thumb-art')->each(function ($n) { 
                    return  ($n->filter('picture img')->attr('src'));
                });
        
                //  $node->filter('.thumb-art')->each(function ($n) { 
                //     echo $n->filter(' a')->attr('href');
                // });
        
                // echo ($node->filter('.title-news a')->text());
        
                dd ($node->filter('.description a')->html());
        
            });
        } catch (\Exception $e) {
            echo $e->getMessage() . "\n";
        }
        echo "Import $total news " . "\n";
    }

    // 
    private function get_list_post($url, $category){
        $crawl = $this->get_content_html(self::url.$url);
        $data = $crawl->filter('.list-news-subfolder article.item-news');
        $datas = $data->each(function(Crawler $item, $i) use ($category){
            if($i < 5){
                $description = $item->filter('.description')->text() ?? null;
                $title = $item->filter('.title-news')->text() ?? null;
                $image = $item->filter('.thumb-art img')->attr('src') ?? null;
                if(preg_match('/data:image/', $image) !== 0 ){
                    $image = $item->filter('.thumb-art img')->attr('data-src') ?? null;
                }

                $link = $item->filter('.thumb-art a')->attr('href') ?? null;
                $content = $this->get_content($link);
                $array = [
                    'title' => $title,
                    'image' => $image,
                    'description' => $description,
                    'link' => $link,
                    'content' => $content['content'],
                    'date' => $content['date'],
                    'category' => $category
                ];
                if(!Post::where('slug', create_slug($title))->exists()){
                    $this->save_data($array);
                }
            }
        });
        $datas = array_filter($datas, function($value) { return !is_null($value) && $value !== ''; });
        return $datas;
    }

    private function get_content($url)
    {
        $crawl = $this->get_content_html($url);
        if($crawl){
            $crawl->filter('ul.list-news')->each(function (Crawler $craw) {
                foreach ($craw as $nodes) {
                    $nodes->parentNode->removeChild($nodes);
                }
            });
            $date = $crawl->filter('.date')->text();
            $data = $crawl->filter('.fck_detail')->html();
            
            $content = preg_replace("/(\n|\t)/", '',strip_tags($data,"<p>,<strong>")) ;
            $content = preg_replace('(<p class="Image">.+?<\/p>)', '',  $content);
            $data = ['content' => $content, 'date' => $date];
            return  $data;
        }
    }

    private function save_data($data)
    {

        DB::transaction(function () use ($data){
            if(!empty($data['category'])){
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
                if(!Category::where('slug', create_slug($data['category']))->exists()){
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