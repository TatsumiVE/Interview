<?php

namespace App\Providers;

use App\Repositories\Interviewer\InterviewerRepoInterface;
use App\Repositories\Interviewer\InterviewerRepository;
use App\Repositories\User\UserRepoInterface;
use App\Repositories\User\UserRepository;
use App\Services\Interviewer\InterviewerService;
use App\Services\Interviewer\InterviewerServiceInterface;
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
        $this->app->bind(InterviewerRepoInterface::class, InterviewerRepository::class);
        $this->app->bind(InterviewerServiceInterface::class, InterviewerService::class);

    }
}
