<?php

namespace App\Providers;

use App\Repositories\Interviewer\InterviewerRepoInterface;
use App\Repositories\Interviewer\InterviewerRepository;
use App\Repositories\Permission\PermissionRepoInterface;
use App\Repositories\Permission\PermissionRepository;
use App\Repositories\User\UserRepoInterface;
use App\Repositories\User\UserRepository;
use App\Repositories\Role\RoleRepoInterface;
use App\Repositories\Role\RoleRepository;
use App\Services\Interviewer\InterviewerService;
use App\Services\Interviewer\InterviewerServiceInterface;
use App\Services\Permission\PermissionService;
use App\Services\Permission\PermissionServiceInterface;
use App\Services\User\UserService;
use App\Services\User\UserServiceInterface;
use App\Services\Role\RoleService;
use App\Services\Role\RoleServiceInterface;

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
        $this->app->bind(UserRepoInterface::class, UserRepository::class);
        $this->app->bind(UserServiceInterface::class, UserService::class);
        $this->app->bind(RoleRepoInterface::class, RoleRepository::class);
        $this->app->bind(RoleServiceInterface::class, RoleService::class);
        $this->app->bind(PermissionRepoInterface::class, PermissionRepository::class);
        $this->app->bind(PermissionServiceInterface::class, PermissionService::class);
        $this->app->bind(InterviewerRepoInterface::class, InterviewerRepository::class);
        $this->app->bind(InterviewerServiceInterface::class, InterviewerService::class);
    }
}
