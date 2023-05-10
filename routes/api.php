<?php


use App\Http\Controllers\Api\AuthController;

use App\Http\Controllers\Api\CandidateController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
Route::post('auth/login', [AuthController::class, 'loginUser']);
Route::post('auth/register', [AuthController::class, 'register']);
Route::apiResource('candidates', CandidateController::class);
