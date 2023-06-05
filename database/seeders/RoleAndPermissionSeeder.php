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
        $userView = Permission::create(['name' => 'userView']);
        $userList = Permission::create(['name' => 'userList']);
        $userCreate = Permission::create(['name' => 'userCreate']);
        $userUpdate = Permission::create(['name' => 'userUpdate']);
        $userDelete = Permission::create(['name' => 'userDelete']);
        $userShow = Permission::create(['name' => 'userShow']);
        $userStatus = Permission::create(['name' => 'userStatus']);

        $agencyView = Permission::create(['name' => 'agencyView']);
        $agencyList = Permission::create(['name' => 'agencyList']);
        $agencyCreate = Permission::create(['name' => 'agencyCreate']);
        $agencyUpdate = Permission::create(['name' => 'agencyUpdate']);
        $agencyDelete = Permission::create(['name' => 'agencyDelete']);
        $agencyShow = Permission::create(['name' => 'agencyShow']);


        $dashboardView = Permission::create(['name' => 'dashboardView']);

        $candidateView = Permission::create(['name' => 'candidateView']);
        $candidateList = Permission::create(['name' => 'candidateList']);
        $candidateCreate = Permission::create(['name' => 'candidateCreate']);
        $candidateUpdate = Permission::create(['name' => 'candidateUpdate']);
        $candidateDelete = Permission::create(['name' => 'candidateDelete']);
        $candidateShow = Permission::create(['name' => 'candidateShow']);



        $candidateSearch = Permission::create(['name' => 'candidateSearch']);

        $candidateInterviewRateShow = Permission::create(['name' => 'candidateInterviewRateShow']);

        $getAllCandidates = Permission::create(['name' => 'getAllCandidates']); //
        $getCandidateById = Permission::create(['name' => 'getCandidateById']);
        $candidatesAll = Permission::create(['name' => 'candidatesAll']);

        $interviewView = Permission::create(['name' => 'interviewView']);
        $interviewList = Permission::create(['name' => 'interviewList']);
        $remarkAssessmentCreate = Permission::create(['name' => 'remarkAssessmentCreate']);


        $interviewProcessCreate = Permission::create(['name' => 'interviewProcessCreate']);
        $interviewProcessSearchAssignId = Permission::create(['name' => 'interviewProcessSearchAssignId']);
        $interviewSummarize = Permission::create(['name' => 'interviewSummarize']);
        $interviewProcessTerminate = Permission::create(['name' => 'interviewProcessTerminate']);

        $interviewerView = Permission::create(['name' => 'interviewerView']);
        $interviewerList = Permission::create(['name' => 'interviewerList']);
        $interviewerCreate = Permission::create(['name' => 'interviewerCreate']);
        $interviewerUpdate = Permission::create(['name' => 'interviewerUpdate']);
        $interviewerDelete = Permission::create(['name' => 'interviewerDelete']);
        $interviewerShow = Permission::create(['name' => 'interviewerShow']);

        $departmentView = Permission::create(['name' => 'departmentView']);
        $departmentList = Permission::create(['name' => 'departmentList']);
        $departmentCreate = Permission::create(['name' => 'departmentCreate']);
        $departmentUpdate = Permission::create(['name' => 'departmentUpdate']);
        $departmentShow = Permission::create(['name' => 'departmentShow']);
        $departmentDelete = Permission::create(['name' => 'departmentDelete']);

        $languageView = Permission::create(['name' => 'languageView']);
        $languageList = Permission::create(['name' => 'languageList']);
        $languageCreate = Permission::create(['name' => 'languageCreate']);
        $languageUpdate = Permission::create(['name' => 'languageUpdate']);
        $languageDelete = Permission::create(['name' => 'languageDelete']);
        $languageShow = Permission::create(['name' => 'languageShow']);
        $positionView = Permission::create(['name' => 'positionView']);
        $positionList = Permission::create(['name' => 'positionList']);
        $positionCreate = Permission::create(['name' => 'positionCreate']);
        $positionUpdate = Permission::create(['name' => 'positionUpdate']);
        $positionDelete = Permission::create(['name' => 'positionDelete']);
        $positionShow = Permission::create(['name' => 'positionShow']);

        $rateView = Permission::create(['name' => 'rateView']);
        $rateList = Permission::create(['name' => 'rateList']);
        $rateCreate = Permission::create(['name' => 'rateCreate']);
        $rateUpdate = Permission::create(['name' => 'rateUpdate']);
        $rateDelete = Permission::create(['name' => 'rateDelete']);
        $rateShow = Permission::create(['name' => 'rateShow']);
        $topicView = Permission::create(['name' => 'topicView']);
        $topicList = Permission::create(['name' => 'topicList']);
        $topicCreate = Permission::create(['name' => 'topicCreate']);
        $topicUpdate = Permission::create(['name' => 'topicUpdate']);
        $topicDelete = Permission::create(['name' => 'topicDelete']);
        $topicShow = Permission::create(['name' => 'topicShow']);

        //super_admin=HR
        $super_admin->givePermissionTo([

            $dashboardView, $userView,

            $userList, $userCreate, $userUpdate, $userDelete, $userShow, $userStatus, $agencyView,

            $agencyList, $agencyCreate, $agencyUpdate, $agencyDelete, $agencyShow,
            $candidateView,

            $candidateList, $candidateCreate, $candidateUpdate, $candidateDelete, $candidateShow,

            $candidateInterviewRateShow,

            $getAllCandidates, $getCandidateById, $candidatesAll,

            $candidateSearch,
            $interviewProcessCreate, $interviewProcessSearchAssignId,
            $interviewSummarize, $interviewProcessTerminate,


            $interviewList,  $remarkAssessmentCreate, $interviewView, $interviewerView,

            $interviewerList, $interviewerCreate, $interviewerUpdate, $interviewerDelete, $interviewerShow, $departmentView,

            $departmentList, $departmentCreate, $departmentUpdate, $departmentDelete, $departmentShow, $languageView,

            $languageList, $languageCreate, $languageUpdate, $languageDelete, $languageShow, $positionView,

            $positionList, $positionCreate, $positionUpdate, $positionDelete, $positionShow, $rateView,

            $rateList, $rateCreate, $rateUpdate, $rateDelete, $rateShow, $topicView,

            $topicList, $topicCreate, $topicUpdate, $topicDelete, $topicShow,
        ]);


        $admin->givePermissionTo([
            $dashboardView, $userView,
            $userList,  $userShow, $agencyView,
            $agencyList,  $agencyShow, $candidateView,
            $candidateList,
            $candidateInterviewRateShow,
            $getAllCandidates, $getCandidateById, $candidatesAll,
            $interviewList, $interviewView,
            $interviewerList, $interviewerView,
            $interviewerShow, $departmentView,
            $departmentList, $departmentShow, $languageView,
            $languageList, $languageShow,
            $positionList,  $positionShow, $positionView,
            $rateList, $rateShow, $rateView,
            $topicList,  $topicShow, $topicView,
        ]);

        //moderator = interviwer
        $moderator->givePermissionTo([
            $dashboardView,
            $agencyList, $agencyShow,
            $candidateList, $languageList,
            $candidateInterviewRateShow, $interviewView,
            $languageView, $positionView, $topicView, $rateView,
            $departmentList,  $positionList, $rateList, $topicList,

            $getAllCandidates, $getCandidateById, $candidatesAll, $interviewerList,
            $interviewList,  $remarkAssessmentCreate, $interviewProcessSearchAssignId
        ]);
    }
}
