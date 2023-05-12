<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Interviewer\InterviewerRepository;
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
        // $this->app->bind(BlogRepoInterFace::class, BlogRepository::class);
        // $this->app->bind(BlogServiceInterface::class, BlogService::class);
        $this->app->bind(
            InterviewerRepoInterface::class,
            InterviewerRepository::class
        );
    }
}
