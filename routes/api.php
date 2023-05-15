<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\AuthController;


use App\Http\Controllers\Api\LanguageController;

use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\AgencyController;
use App\Http\Controllers\Api\SpecificController;
use App\Http\Controllers\Api\CandidateController;

use App\Http\Controllers\Api\InterviewerController;
use App\Http\Controllers\Api\InterviewAssignController;
use App\Http\Controllers\Api\InterviewCreateController;

use App\Http\Controllers\Api\RoleController;
use App\Http\Controllers\Api\PermissionController;

use App\Http\Controllers\Api\TopicController;
use App\Http\Controllers\Api\RateController;


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


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('auth/login', [AuthController::class, 'UserLogin']);

Route::apiResource('user', UserController::class);

Route::apiResource('role',RoleController::class);

Route::apiResource('permission',PermissionController::class);

Route::apiResource('languages', LanguageController::class);
Route::apiResource('interviewers', InterviewerController::class);
Route::apiResource('topics', TopicController::class);
Route::apiResource('rates', RateController::class);
Route::apiResource('candidates', CandidateController::class);

Route::apiResource('agency', AgencyController::class);


Route::apiResource('interviewAssign', InterviewAssignController::class);

