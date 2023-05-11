<?php


namespace App\Providers;

use App\Repositories\User\UserRepository;
use App\Repositories\User\UserRepoInterface;
use App\Services\User\UserService;
use App\Services\User\UserServiceInterface;
use Illuminate\Support\ServiceProvider;


class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(UserRepoInterface::class,UserRepository::class);
        $this->app->bind(UserServiceInterface::class,UserService::class);
    }
}
