<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\AuthController;


use App\Http\Controllers\Api\RateController;
use App\Http\Controllers\Api\RoleController;

use App\Http\Controllers\Api\UserController;

use App\Http\Controllers\API\SearchCandidate;

use App\Http\Controllers\Api\TopicController;
use App\Http\Controllers\Api\AgencyController;
use App\Http\Controllers\Api\LanguageController;
use App\Http\Controllers\Api\PositionController;

use App\Http\Controllers\Api\CandidateController;

use App\Http\Controllers\Api\InterviewController;


use App\Http\Controllers\Api\DepartmentController;
use App\Http\Controllers\Api\PermissionController;
use App\Http\Controllers\Api\InterviewerController;
use App\Http\Controllers\Api\CandidateDetailController;
use App\Http\Controllers\Api\InterviewAssignController;
use App\Http\Controllers\Api\InterviewDetailController;
use App\Http\Controllers\API\SearchCandidateController;
use App\Http\Controllers\Api\CandidateInterviewRateController;

use App\Http\Controllers\Api\DevLanguageController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('auth/login', [AuthController::class, 'UserLogin']);



Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('users', UserController::class);
    Route::apiResource('roles', RoleController::class);
    Route::apiResource('permissions', PermissionController::class);

    Route::apiResource('topics', TopicController::class);
    Route::apiResource('rates', RateController::class);
    Route::apiResource('agencies', AgencyController::class);
    Route::apiResource('interview_assigns', InterviewAssignController::class);
    Route::apiResource('departments', DepartmentController::class);

    Route::apiResource('dev_languages', DevLanguageController::class);
    Route::apiResource('interviews', InterviewController::class);

    Route::apiResource('candidates', CandidateController::class);
    Route::apiResource('positions', PositionController::class);
    Route::apiResource('agencies', AgencyController::class);
    Route::apiResource('candidate_details', CandidateDetailController::class);
    Route::apiResource('interviewers', InterviewerController::class);
    Route::apiResource('candidate_interviews', CandidateInterviewRateController::class);
    Route::post('candidates/search', [SearchCandidateController::class, 'search']);
});
