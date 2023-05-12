<?php

namespace App\Providers;

use App\Repositories\Interviewer\InterviewerRepoInterface;
use App\Repositories\Interviewer\InterviewerRepository;
use App\Services\Interviewer\InterviewerService;
use App\Services\Interviewer\InterviewerServiceInterface;
use Illuminate\Support\ServiceProvider;
use App\Repositories\Language\LanguageRepoInterface;
use App\Repositories\Language\LanguageRepository;
use App\Services\Language\LanguageServiceInterface;
use App\Services\Language\LanguageService;

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
        $this->app->bind(LanguageRepoInterFace::class, LanguageRepository::class);
        $this->app->bind(LanguageServiceInterface::class, LanguageService::class);
        $this->app->bind(InterviewerRepoInterface::class, InterviewerRepository::class);
        $this->app->bind(InterviewerServiceInterface::class, InterviewerService::class);

    }
}
