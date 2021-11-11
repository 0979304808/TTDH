<?php

use Illuminate\Support\Facades\Route;
use App\Events\NewEvent;
use Goutte\Client;
use Symfony\Component\DomCrawler\Crawler;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// --------------------- BackEnd -------------------------

Route::group(['prefix' => 'admin', 'namespace' => 'BackEnd'], function () {

    // Login and register
    Route::group(['namespace' => 'Auth'], function () {
        Route::get('/', 'LoginController@index')->name('backend.index');
        Route::post('login', 'LoginController@login')->name('backend.login');

        Route::get('register', 'RegisterController@index')->name('backend.register');
        Route::post('register', 'RegisterController@register')->name('backend.register.create');
    });


    // Login thành công
    Route::group([
        'middleware' => 'user'
    ], function () {

        // Dashboard và logout
        Route::get('/dashboard', 'HomeController@index')->name('backend.dashboard');
        Route::get('/logout', 'HomeController@logout')->name('backend.logout');


        // Administrator
        Route::group([
        ], function () {

            // Account
            Route::group([
                'prefix' => 'accounts',
                'namespace' => 'Accounts',
                'middleware' => ['role:administrator']
            ], function () {
                Route::get('/', 'AccountController@list')->name('backend.account');
                Route::put('/', 'AccountController@active')->name('backend.account.active');
                Route::put('update-role', 'AccountController@updateRoleAdmin')->name('backend.account.update.role');
                Route::put('update-permission', 'AccountController@updatePermissionAdmin')->name('backend.account.update.permission');
            });

            // Role
            Route::group([
                'prefix' => 'roles',
                'namespace' => 'Accounts',
                'middleware' => ['role:administrator']
            ], function () {
                Route::get('/', 'RoleController@list')->name('backend.role');
                Route::post('/', 'RoleController@create')->name('backend.role.create');
                Route::put('add-permission', 'RoleController@addPermissionToRole')->name('backend.role.add.permission');
                Route::delete('/', 'RoleController@delete')->name('backend.role.delete');
            });

            // Permission
            Route::group([
                'prefix' => 'permissions',
                'namespace' => 'Accounts',
                'middleware' => ['role:administrator']
            ], function () {
                Route::get('/', 'PermissionController@list')->name('backend.permission');
                Route::post('/', 'PermissionController@create')->name('backend.permission.create');
            });

            // Profile
            Route::group([
                'prefix' => 'profile',
                'namespace' => 'Profile'
            ], function () {
                Route::group([
                    'prefix' => '{user}',
                    'where' => ['user', '[0-9]+']
                ], function () {
                    Route::get('/', 'ProfileController@detail')->name('backend.profile');
                    Route::put('image', 'ProfileController@updateImage')->name('backend.profile.image');
                    Route::put('update', 'ProfileController@updateProfile')->name('backend.profile.update');
                });

            });

            // Posts
            Route::group([
                'prefix' => 'post',
                'namespace' => 'Posts'
            ], function () {
                Route::get('/', 'PostController@index')->name('backend.posts');
                Route::get('create', 'PostController@create')->name('backend.posts.create');
                Route::post('create', 'PostController@store')->name('backend.posts.store');
                Route::put('update', 'PostController@update')->name('backend.posts.update');
                Route::get('detail', 'PostController@detail')->name('backend.posts.detail');
                Route::put('catpost', 'PostController@UpdateCatePost')->name('backend.update.categories.post');
                Route::delete('delete', 'PostController@delete')->name('backend.delete.post');
            });

            // Comments
            Route::group([
                'prefix' => 'comment',
                'namespace' => 'Comments'
            ], function () {
                Route::post('create', 'CommentController@create')->name('backend.comments.create');
                Route::put('update', 'CommentController@update')->name('backend.comments.update');
            });

            // test
            Route::group([
                'prefix' => 'test',
            ], function () {
                Route::get('/', function () {
                    event(new NewEvent('abc'));
                });
            });


        });

    });

});

// Ckfinder
Route::any('/ckfinder/connector', '\CKSource\CKFinderBridge\Controller\CKFinderController@requestAction')
    ->name('ckfinder_connector');

Route::any('/ckfinder/browser', '\CKSource\CKFinderBridge\Controller\CKFinderController@browserAction')
    ->name('ckfinder_browser');

// ---------------------End  BackEnd -------------------------


// ------------------- FrontEnd -------------------
// Auth
Route::group([
    'prefix' => 'auth',
    'namespace' => 'Auth'
], function () {

    Route::get('/redirect/{provider}', 'SocialController@handler');

    Route::get('/callback/{provider}', 'SocialController@callback');

});



Route::group(['namespace' => 'FrontEnd'], function () {

    Route::get('/', 'HomeController@index');


});




// Crawl data 

Route::get('test', function () {
    $this->client = new Client();
    $url = 'https://vnexpress.net/doi-song/to-am';
    $crawler = $this->client->request('GET', $url);
    $data = $crawler->filter('.list-news-subfolder article.item-news');
    $datas = []; 
    $a = $data->each(function(Crawler $item, $i) use ($datas){
        if($i < 5){
            $description = $item->filter('.description')->text() ?? null;
            $title = $item->filter('.title-news')->text() ?? null;
            $image = $item->filter('.thumb-art img')->attr('src') ?? null;
            $link = $item->filter('.thumb-art a')->attr('href') ?? null;
            $array = [
                'title' => $title,
                'image' => $image,
                'description' => $description,
                'link' => $link,
            ];
            array_push($datas, $array); 
        }
        return $datas;
    });
    dd($a);

    // $a = $data->each(
    //     function($node){
    //        return $node->filter('.item-news')->html();
    // });
    // dd($a);
});
