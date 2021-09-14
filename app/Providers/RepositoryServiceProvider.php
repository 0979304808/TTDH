<?php

namespace App\Providers;

use App\Repositories\Categories\CategoryRepository;
use App\Repositories\Categories\Contract\CategoryRepositoryInterface;
use App\Repositories\Comments\CommentRepository;
use App\Repositories\Comments\Contract\CommentRepositoryInterface;
use App\Repositories\Permissions\Contract\PermissionRepositoryInterface;
use App\Repositories\Permissions\PermissionRepository;
use App\Repositories\Posts\Contract\PostRepositoryInterface;
use App\Repositories\Posts\PostRepository;
use App\Repositories\Roles\Contract\RoleRepositoryInterface;
use App\Repositories\Roles\RoleRepository;
use App\Repositories\Users\UserRepository;
use App\Repositories\Users\Contract\UserRepositoryInterface;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;



class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            UserRepositoryInterface::class,
            UserRepository::class
        );
        $this->app->bind(
            PermissionRepositoryInterface::class,
            PermissionRepository::class
        );
        $this->app->bind(
            RoleRepositoryInterface::class,
            RoleRepository::class
        );
        $this->app->bind(
            PostRepositoryInterface::class,
            PostRepository::class
        );
        $this->app->bind(
            CategoryRepositoryInterface::class,
            CategoryRepository::class
        );
        $this->app->bind(
            CommentRepositoryInterface::class,
            CommentRepository::class
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
