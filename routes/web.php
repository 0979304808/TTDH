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

Route::get('/', function () {
    return view('welcome');
});


Route::group(['prefix' => 'admin', 'namespace' => 'BackEnd'], function() {
    
    // Login and register
    Route::group(['prefix' => 'auth', 'namespace' => 'Auth'], function() {
        Route::get('login', 'LoginController@index')->name('backend.login');
        Route::post('login', 'LoginController@login')->name('backend.login.attem');
    
        Route::get('register', 'RegisterController@index')->name('backend.register');
        Route::post('register', 'RegisterController@register')->name('backend.register.create');
    });
    

    // Login thành công
    Route::group([
        'middleware' => 'auth'
    ], function () {

        // Dashboard và logout
        Route::get('/dashboard', 'HomeController@index')->name('backend.dashboard');
        Route::get('/logout', 'HomeController@logout')->name('backend.logout');


        // Administrator
        Route::group([
            'prefix' => 'auth',
        ], function () {
            // Account
            Route::group([
                'prefix' => 'accounts',
                'namespace' => 'Auth',
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
                'namespace' => 'Auth',
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
                'namespace' => 'Auth',
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
        });

    });
    
});
