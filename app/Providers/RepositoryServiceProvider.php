<?php

namespace App\Providers;

use App\Services\User\UserService;
use Illuminate\Support\ServiceProvider;
use App\Repositories\User\UserRepository;
use App\Services\User\UserServiceInterface;
use App\Repositories\User\UserRepoInterface;
use App\Services\Interview\InterviewService;
use App\Services\Interviewer\InterviewerService;
use App\Repositories\Interview\InterviewRepository;
use App\Services\Interview\InterviewServiceInterface;
use App\Repositories\Interview\InterviewRepoInterface;
use App\Repositories\Interviewer\InterviewerRepository;
use App\Services\Interviewer\InterviewerServiceInterface;
use App\Repositories\Interviewer\InterviewerRepoInterface;

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
        $this->app->bind(InterviewRepoInterface::class, InterviewRepository::class);
        $this->app->bind(InterviewServiceInterface::class, InterviewService::class);

    }
}
