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

        $dashboardView = Permission::create(['name' => 'dashboardView']);


        $candidateList = Permission::create(['name' => 'candidateList']);
        $candidateCreate = Permission::create(['name' => 'candidateCreate']);
        $candidateUpdate = Permission::create(['name' => 'candidateUpdate']);
        $candidateDelete = Permission::create(['name' => 'candidateDelete']);
        $candidateShow = Permission::create(['name' => 'candidateShow']);




        $candidateSearch = Permission::create(['name' => 'candidateSearch']);

        $candidateInterviewRateShow = Permission::create(['name' => 'candidateInterviewRateShow']);

        $getAllCandidates = Permission::create(['name' => 'getAllCandidates']);
        $getCandidateById = Permission::create(['name' => 'getCandidateById']);
        $getCandidatesByStageName = Permission::create(['name' => 'getCandidatesByStageName']);

        $interviewList = Permission::create(['name' => 'interviewList']);
        $remarkAssessmentCreate = Permission::create(['name' => 'remarkAssessmentCreate']);




        $interviewProcessCreate = Permission::create(['name' => 'interviewProcessCreate']);
        $interviewProcessSearchAssignId = Permission::create(['name' => 'interviewProcessSearchAssignId']);
        $interviewSummarize = Permission::create(['name' => 'interviewSummarize']);
        $interviewProcessTerminate = Permission::create(['name' => 'interviewProcessTerminate']);


        $interviewerList = Permission::create(['name' => 'interviewerList']);
        $interviewerCreate = Permission::create(['name' => 'interviewerCreate']);
        $interviewerUpdate = Permission::create(['name' => 'interviewerUpdate']);
        $interviewerDelete = Permission::create(['name' => 'interviewerDelete']);
        $interviewerShow = Permission::create(['name' => 'interviewerShow']);

        $departmentList = Permission::create(['name' => 'departmentList']);
        $departmentCreate = Permission::create(['name' => 'departmentCreate']);
        $departmentUpdate = Permission::create(['name' => 'departmentUpdate']);
        $departmentShow = Permission::create(['name' => 'departmentShow']);
        $departmentDelete = Permission::create(['name' => 'departmentDelete']);

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

        //super_admin=HR
        $super_admin->givePermissionTo([

            $dashboardView,

            $userList, $userCreate, $userUpdate, $userDelete, $userShow,

            $agencyList, $agencyCreate, $agencyUpdate, $agencyDelete, $agencyShow,

            $candidateList, $candidateCreate, $candidateUpdate, $candidateDelete, $candidateShow,

            $candidateInterviewRateShow,

            $getAllCandidates, $getCandidateById, $getCandidatesByStageName,

            $candidateSearch,
            $interviewProcessCreate, $interviewProcessSearchAssignId,
            $interviewSummarize, $interviewProcessTerminate,


            $interviewList,  $remarkAssessmentCreate,

            $interviewerList, $interviewerCreate, $interviewerUpdate, $interviewerDelete, $interviewerShow,

            $departmentList, $departmentCreate, $departmentUpdate, $departmentDelete, $departmentShow,

            $languageList, $languageCreate, $languageUpdate, $languageDelete, $languageShow,

            $positionList, $positionCreate, $positionUpdate, $positionDelete, $positionShow,

            $rateList, $rateCreate, $rateUpdate, $rateDelete, $rateShow,

            $topicList, $topicCreate, $topicUpdate, $topicDelete, $topicShow,
        ]);

        //admin=ManagementTeam 
        $admin->givePermissionTo([

            $dashboardView,

            $userList,  $userShow,

            $agencyList,  $agencyShow,

            $candidateList,  $candidateShow,
            $candidateInterviewRateShow,

            $getAllCandidates, $getCandidateById, $getCandidatesByStageName,

            $candidateSearch,
            $interviewProcessSearchAssignId,
            $interviewSummarize, $interviewProcessTerminate,


            $interviewList,  $remarkAssessmentCreate,

            $interviewerList,  $interviewerShow,

            $departmentList, $departmentShow,

            $languageList, $languageShow,

            $positionList,  $positionShow,

            $rateList, $rateShow,

            $topicList,  $topicShow,
        ]);

        //moderator = interviwer 
        $moderator->givePermissionTo([
            $dashboardView,

            $userList, $userShow,

            $agencyList, $agencyShow,

            $candidateList, $candidateShow,

            $candidateInterviewRateShow,

            $getAllCandidates, $getCandidateById, $getCandidatesByStageName,

            $candidateSearch,
            $interviewProcessCreate, $interviewProcessSearchAssignId,
            $interviewSummarize, $interviewProcessTerminate,


            $interviewList,  $remarkAssessmentCreate,

            $interviewerList, $interviewerShow,

            $departmentList, $departmentShow,

            $languageList, $languageShow,

            $positionList, $positionShow,

            $rateList, $rateShow,

            $topicList, $topicShow,
        ]);
    }
}
