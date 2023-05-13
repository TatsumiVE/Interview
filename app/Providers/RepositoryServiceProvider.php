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

use App\Repositories\Topic\TopicRepoInterface;
use App\Repositories\Topic\TopicRepository;
use App\Services\Topic\TopicServiceInterface;
use App\Services\Topic\TopicService;

use App\Repositories\Rate\RateRepoInterface;
use App\Repositories\Rate\RateRepository;
use App\Services\Rate\RateServiceInterface;
use App\Services\Rate\RateService;

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


        $this->app->bind(LanguageRepoInterFace::class, LanguageRepository::class);
        $this->app->bind(LanguageServiceInterface::class, LanguageService::class);

        $this->app->bind(InterviewerRepoInterface::class, InterviewerRepository::class);
        $this->app->bind(InterviewerServiceInterface::class, InterviewerService::class);

        $this->app->bind(TopicRepoInterface::class, TopicRepository::class);
        $this->app->bind(TopicServiceInterface::class, TopicService::class);

        $this->app->bind(RateRepoInterface::class, RateRepository::class);
        $this->app->bind(RateServiceInterface::class, RateService::class);
    }
}
