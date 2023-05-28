<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $super_admin = Role::create(['name' => 'SuperAdmin']);
        $admin = Role::create(['name' => 'Admin']);
        $moderator = Role::create(['name' => 'Moderator']);

        $userList = Permission::create(['name' => 'userList']);
        $userCreate = Permission::create(['name' => 'userCreate']);
        $userUpdate = Permission::create(['name' => 'userUpdate']);
        $userDelete = Permission::create(['name' => 'userDelete']);
        $userShow = Permission::create(['name' => 'userShow']);

        $agencyList = Permission::create(['name' => 'agencyList']);
        $agencyCreate = Permission::create(['name' => 'agencyCreate']);
        $agencyUpdate = Permission::create(['name' => 'agencyUpdate']);
        $agencyDelete = Permission::create(['name' => 'agencyDelete']);
        $agencyShow = Permission::create(['name' => 'agencyShow']);

        $dashboardView= Permission::create(['name'=>'dashboardView']);

        $interviewList = Permission::create(['name' => 'interviewList']);
        $interviewCreate = Permission::create(['name' => 'interviewCreate']);
        $interviewShow = Permission::create(['name'=>'interviewShow']);

        $candidateList = Permission::create(['name' => 'candidateList']);
        $candidateCreate = Permission::create(['name' => 'candidateCreate']);
        $candidateUpdate = Permission::create(['name' => 'candidateUpdate']);
        $candidateDelete = Permission::create(['name' => 'candidateDelete']);
        $candidateShow = Permission::create(['name' => 'candidateShow']);
        $candidateDetail = Permission::create(['name' => 'candidateDetail']);


        $candidateSearch=Permission::create(['name'=>'candidateSearch']);

        $candidateInterviewRateShow = Permission::create(['name' => 'candidateInterviewRateShow']);

        $interviewProcessCreate=Permission::create(['name'=>'interviewProcessCreate']);
        $interviewProcessSearchAssignId=Permission::create(['name'=>'interviewProcessSearchAssignId']);
        $interviewProcessUpdate = Permission::create(['name' => 'interviewProcessUpdate']);
        $interviewProcessTerminate = Permission::create(['name' => 'interviewProcessTerminate']);
        $interviewerList = Permission::create(['name' => 'interviewerList']);
        $interviewerCreate = Permission::create(['name' => 'interviewerCreate']);
        $interviewerUpdate = Permission::create(['name' => 'interviewerUpdate']);
        $interviewerDelete = Permission::create(['name' => 'interviewerDelete']);
        $interviewerShow = Permission::create(['name' => 'interviewerShow']);

        $departmentList = Permission::create(['name' => 'departmentList']);
        $departmentCreate = Permission::create(['name' => 'departmentCreate']);
        $departmentUpdate = Permission::create(['name' => 'departmentUpdate']);
        $departmentDelete = Permission::create(['name' => 'departmentDelete']);
        $departmentShow = Permission::create(['name' => 'departmentShow']);

        $languageList = Permission::create(['name' => 'languageList']);
        $languageCreate = Permission::create(['name' => 'languageCreate']);
        $languageUpdate = Permission::create(['name' => 'languageUpdate']);
        $languageDelete = Permission::create(['name' => 'languageDelete']);
        $languageShow = Permission::create(['name' => 'languageShow']);

        $positionList = Permission::create(['name' => 'positionList']);
        $positionCreate = Permission::create(['name' => 'positionCreate']);
        $positionUpdate = Permission::create(['name' => 'positionUpdate']);
        $positionDelete = Permission::create(['name' => 'positionDelete']);
        $positionShow = Permission::create(['name' => 'positionShow']);

        $rateList = Permission::create(['name' => 'rateList']);
        $rateCreate = Permission::create(['name' => 'rateCreate']);
        $rateUpdate = Permission::create(['name' => 'rateUpdate']);
        $rateDelete = Permission::create(['name' => 'rateDelete']);
        $rateShow = Permission::create(['name' => 'rateShow']);

        $topicList = Permission::create(['name' => 'topicList']);
        $topicCreate = Permission::create(['name' => 'topicCreate']);
        $topicUpdate = Permission::create(['name' => 'topicUpdate']);
        $topicDelete = Permission::create(['name' => 'topicDelete']);
        $topicShow = Permission::create(['name' => 'topicShow']);


        $super_admin->givePermissionTo([

            $dashboardView,

            $userList, $userCreate, $userUpdate, $userDelete, $userShow,

            $agencyList, $agencyCreate, $agencyUpdate, $agencyDelete, $agencyShow,

            $candidateList,$candidateCreate,$candidateUpdate,$candidateDelete,$candidateShow,

            $candidateDetail,

            $candidateInterviewRateShow,

            $candidateSearch,

            $interviewCreate,

            $interviewProcessCreate,$interviewProcessSearchAssignId,$interviewProcessUpdate,$interviewProcessTerminate,

            $interviewerList,$interviewerCreate,$interviewerUpdate,$interviewerDelete,$interviewerShow,

            $departmentList,$departmentCreate,$departmentUpdate,$departmentDelete,$departmentShow,

            $languageList,$languageCreate,$languageUpdate,$languageDelete,$languageShow,

            $positionList,$positionCreate,$positionUpdate,$positionDelete,$positionShow,

            $rateList,$rateCreate,$rateUpdate,$rateDelete,$rateShow ,

            $topicList,$topicCreate,$topicUpdate,$topicDelete,$topicShow
        ]);

        $admin->givePermissionTo([

            $dashboardView,

            $userList,

            $agencyList,

            $candidateList,

            $candidateSearch,

            $interviewerList,

            $departmentList,

            $languageList,

            $positionList,

            $rateList,

            $topicList
        ]);

        $moderator->givePermissionTo([
            $candidateList,
        ]);

    }
}
