<?php 
namespace App\Crawl;
use Goutte\Client;

class Vnexpress {
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
            $this->get_content($crawler);
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
        
                // dd ($node->filter('.description a')->html());
        
            });
        } catch (\Exception $e) {
            echo $e->getMessage() . "\n";
        }
        echo "Import $total news " . "\n";
    }

    private function get_content(){
        
    }



}