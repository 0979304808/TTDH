<?php

use Illuminate\Support\Facades\Route;

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
            });

            // Comments
            Route::group([
                'prefix' => 'comment',
                'namespace' => 'Comments'
            ], function () {
                Route::post('create', 'CommentController@create')->name('backend.comments.create');
                Route::put('update', 'CommentController@update')->name('backend.comments.update');
            });

        });

    });

});

// Ckfinder
Route::any('/ckfinder/connector', '\CKSource\CKFinderBridge\Controller\CKFinderController@requestAction')
    ->name('ckfinder_connector');

Route::any('/ckfinder/browser', '\CKSource\CKFinderBridge\Controller\CKFinderController@browserAction')
    ->name('ckfinder_browser');
