<?php

namespace App\Providers;

use App\Repository\CategoryRepository;
use App\Repository\FollowRepository;
use App\Repository\HashtagRepository;
use App\Repository\ManagerPostRepository;
use App\Repository\NotificationRepository;
use App\Repository\PostHashtagRepository;
use App\Repository\PostRepository;
use App\Repository\ReportRepository;
use App\Repository\Resource\CategoryRepositoryInterface;
use App\Repository\Resource\FollowRepositoryInterface;
use App\Repository\Resource\HashtagRepositoryInterface;
use App\Repository\Resource\ManagerPostRepositoryInterface;
use App\Repository\Resource\NotificationRepositoryInterface;
use App\Repository\Resource\PostHashTagRepositoryInterface;
use App\Repository\Resource\PostRepositoryInterface;
use App\Repository\Resource\ReportRepositoryInterface;
use App\Repository\Resource\ReviewRepositoryInterface;
use App\Repository\Resource\RoleRepositoryInterface;
use App\Repository\Resource\StatusRepositoryInterface;
use App\Repository\Resource\UserRepositoryInterface;
use App\Repository\ReviewRepository;
use App\Repository\RoleRepository;
use App\Repository\StatusRepository;
use App\Repository\UserRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->singleton(
            CategoryRepositoryInterface::class,
            CategoryRepository::class
        );

        $this->app->singleton(
            HashtagRepositoryInterface::class,
            HashtagRepository::class
        );

        $this->app->singleton(
            NotificationRepositoryInterface::class,
            NotificationRepository::class
        );

        $this->app->singleton(
            StatusRepositoryInterface::class,
            StatusRepository::class
        );

        $this->app->singleton(
            FollowRepositoryInterface::class,
            FollowRepository::class
        );

        $this->app->singleton(
            PostRepositoryInterface::class,
            PostRepository::class
        );

        $this->app->singleton(
            UserRepositoryInterface::class,
            UserRepository::class
        );

        $this->app->singleton(
            ReviewRepositoryInterface::class,
            ReviewRepository::class
        );

        $this->app->singleton(
            ReportRepositoryInterface::class,
            ReportRepository::class
        );

        $this->app->singleton(
            ManagerPostRepositoryInterface::class,
            ManagerPostRepository::class
        );

        $this->app->singleton(
            RoleRepositoryInterface::class,
            RoleRepository::class
        );

        $this->app->singleton(
            PostHashTagRepositoryInterface::class,
            PostHashtagRepository::class
        );
    }
}
