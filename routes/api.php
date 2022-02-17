<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::group([
    'prefix' => 'post',
    'namespace' => 'Api',
    'middleware' => 'cors'
], function () {
    Route::get('/', 'PostController@list')->name('api.post.list');
    Route::get('/{id}', 'PostController@detail')->name('api.post.detail');
});

// test
