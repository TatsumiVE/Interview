<?php

namespace App\Providers;

use App\Services\User\UserService;
use App\Services\Agency\AgencyService;
use Illuminate\Support\ServiceProvider;
use App\Repositories\User\UserRepository;
use App\Services\User\UserServiceInterface;
use App\Repositories\User\UserRepoInterface;
use App\Services\Candidate\CandidateService;
use App\Repositories\Agency\AgencyRepository;
use App\Services\Agency\AgencyServiceInterface;

use App\Repositories\Agency\AgencyRepoInterface;
use App\Services\Interviewer\InterviewerService;
use App\Repositories\Candidate\CandidateRepository;
use App\Services\Candidate\CandidateServiceInterface;
use App\Repositories\Candidate\CandidateRepoInterface;
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
        $this->app->bind(UserRepoInterface::class, UserRepository::class);
        $this->app->bind(UserServiceInterface::class, UserService::class);
        $this->app->bind(InterviewerRepoInterface::class, InterviewerRepository::class);
        $this->app->bind(InterviewerServiceInterface::class, InterviewerService::class);


        $this->app->bind(CandidateRepoInterface::class, CandidateRepository::class);
        $this->app->bind(CandidateServiceInterface::class, CandidateService::class);

        $this->app->bind(AgencyRepoInterface::class, AgencyRepository::class);
        $this->app->bind(AgencyServiceInterface::class, AgencyService::class);
    }
}
