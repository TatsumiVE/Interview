<?php


use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\AuthController;


use App\Http\Controllers\Api\RateController;
use App\Http\Controllers\Api\RoleController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\TopicController;
use App\Http\Controllers\Api\AgencyController;

use App\Http\Controllers\Api\BarChartController;
use App\Http\Controllers\Api\PositionController;
use App\Http\Controllers\Api\CandidateController;
use App\Http\Controllers\Api\InterviewController;
use App\Http\Controllers\Api\DepartmentController;
use App\Http\Controllers\Api\PermissionController;
use App\Http\Controllers\Api\DevLanguageController;
use App\Http\Controllers\Api\InterviewerController;
use App\Http\Controllers\Api\CandidateDetailController;
use App\Http\Controllers\Api\CandidateSearchController;


use App\Http\Controllers\Api\InterviewProcessController;

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

// Route::middleware('auth:sanctum')->group(function () {

Route::post('interview-process', [InterviewProcessController::class, 'store']);

Route::post('interview-process/summerize/{candiateId}/{stageId}', [InterviewProcessController::class, 'interviewSummerize']);
//find AssignI
Route::get('interview-process/{candiateId},{interviewerId}', [InterviewProcessController::class, 'searchInterviewAssignId']);
Route::post('interview-process/terminate/{candidateId}', [InterviewProcessController::class, 'terminateProcess']);

Route::get('interview-process/checkStage/{candidateId}', [InterviewProcessController::class, 'checkInterviewStage']);

// Route::get('interview-process/{interviewAssignId}',[InterviewProcessController::class,'showAssessment']);
Route::apiResource('users', UserController::class);
Route::apiResource('roles', RoleController::class);
Route::apiResource('permissions', PermissionController::class);
Route::apiResource('topics', TopicController::class);
Route::apiResource('rates', RateController::class);
Route::apiResource('agencies', AgencyController::class);
Route::apiResource('departments', DepartmentController::class);
Route::apiResource('positions', PositionController::class);
Route::apiResource('dev-languages', DevLanguageController::class);
Route::apiResource('candidates', CandidateController::class);
Route::post('candidates/searchs', [CandidateSearchController::class, 'search']);

Route::get('candidate-barchart', [BarChartController::class, 'index']);

Route::apiResource('interviewers', InterviewerController::class);
//  Route::apiResource('candidate-interviews', CandidateInterviewRateController::class);
Route::apiResource('interviews', InterviewController::class);
// });


Route::get('candidate-detail/{id}', [CandidateDetailController::class, 'candidateDetail']);
