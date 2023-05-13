<?php




use Illuminate\Http\Request;

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\AuthController;

use App\Http\Controllers\Api\LanguageController;
use App\Http\Controllers\Api\InterviewerController;
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
Route::post('auth/register', [AuthController::class, 'UserRegister']);
//Route::apiResource('candidates', CandidateController::class);


Route::apiResource('languages', LanguageController::class);
Route::apiResource('interviewers', InterviewerController::class);
Route::apiResource('topics', TopicController::class);
Route::apiResource('rates', RateController::class);



