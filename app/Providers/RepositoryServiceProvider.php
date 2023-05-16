<?php

namespace App\Providers;

use App\Services\Rate\RateService;

use App\Services\Role\RoleService;
use App\Services\User\UserService;
use App\Services\Topic\TopicService;
use App\Services\Agency\AgencyService;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Rate\RateRepository;
use App\Repositories\Role\RoleRepository;
use App\Repositories\User\UserRepository;

use App\Services\Language\LanguageService;
use App\Repositories\Topic\TopicRepository;
use App\Services\Rate\RateServiceInterface;
use App\Services\Role\RoleServiceInterface;

use App\Services\User\UserServiceInterface;
use App\Repositories\Rate\RateRepoInterface;
use App\Repositories\Role\RoleRepoInterface;
use App\Repositories\User\UserRepoInterface;

use App\Services\Candidate\CandidateService;
use App\Repositories\Agency\AgencyRepository;


use App\Services\Topic\TopicServiceInterface;
use App\Repositories\Topic\TopicRepoInterface;
use App\Services\Permission\PermissionService;
use App\Services\Agency\AgencyServiceInterface;


use App\Repositories\Agency\AgencyRepoInterface;
use App\Services\Interviewer\InterviewerService;
use App\Repositories\Language\LanguageRepository;
use App\Repositories\Candidate\CandidateRepository;

use App\Services\Language\LanguageServiceInterface;
use App\Repositories\Language\LanguageRepoInterface;
use App\Repositories\Permission\PermissionRepository;
use App\Services\Candidate\CandidateServiceInterface;

use App\Repositories\Candidate\CandidateRepoInterface;
use App\Repositories\Interviewer\InterviewerRepository;
use App\Services\Permission\PermissionServiceInterface;
use App\Repositories\Permission\PermissionRepoInterface;
use App\Services\InterviewAssign\InterviewAssignService;
use App\Services\Interviewer\InterviewerServiceInterface;
use App\Repositories\Interviewer\InterviewerRepoInterface;
use App\Repositories\InterviewAssign\InterviewAssignRepository;
use App\Services\InterviewAssign\InterviewAssignServiceInterface;
use App\Repositories\InterviewAssign\InterviewAssignRepoInterface;
use App\Repositories\InterviewDetail\InterviewDetailRepoInterface;
use App\Repositories\InterviewDetail\InterviewDetailRepository;

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


        $this->app->bind(RoleRepoInterface::class, RoleRepository::class);
        $this->app->bind(RoleServiceInterface::class, RoleService::class);
        $this->app->bind(PermissionRepoInterface::class, PermissionRepository::class);
        $this->app->bind(PermissionServiceInterface::class, PermissionService::class);

        $this->app->bind(LanguageRepoInterFace::class, LanguageRepository::class);
        $this->app->bind(LanguageServiceInterface::class, LanguageService::class);



        $this->app->bind(TopicRepoInterface::class, TopicRepository::class);
        $this->app->bind(TopicServiceInterface::class, TopicService::class);

        $this->app->bind(RateRepoInterface::class, RateRepository::class);
        $this->app->bind(RateServiceInterface::class, RateService::class);

        $this->app->bind(UserRepoInterface::class, UserRepository::class);
        $this->app->bind(UserServiceInterface::class, UserService::class);

        $this->app->bind(InterviewerRepoInterface::class, InterviewerRepository::class);
        $this->app->bind(InterviewerServiceInterface::class, InterviewerService::class);


        $this->app->bind(CandidateRepoInterface::class, CandidateRepository::class);
        $this->app->bind(CandidateServiceInterface::class, CandidateService::class);


        $this->app->bind(AgencyRepoInterface::class, AgencyRepository::class);
        $this->app->bind(AgencyServiceInterface::class, AgencyService::class);


        $this->app->bind(InterviewAssignRepoInterface::class, InterviewAssignRepository::class);
        $this->app->bind(InterviewAssignServiceInterface::class, InterviewAssignService::class);

        $this->app->bind(InterviewDetailRepoInterface::class, InterviewDetailRepository::class);
    }
}
