<?php

use App\Http\Controllers\Api\ClassController;
use App\Http\Controllers\Api\StudentController;
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

Route::get('all-class', [ClassController::class, 'index']);
Route::post('/student/login', [StudentController::class, 'studentLogin']);


Route::middleware('auth:api')->group(function(){
    Route::get('show-all-video-student/', [StudentController::class, 'showVideo']);
    Route::get('show-student-profile/', [StudentController::class, 'studentProfile']);
    Route::get('show-all-video-student-count/', [StudentController::class, 'countVideo']);
    Route::get('show-all-video-student-news-video/', [StudentController::class, 'newsVideoShow']);
    Route::get('show-all-video-student-news-video-count/', [StudentController::class, 'newsVideoCount']);
    Route::get('student-password-change-sing/', [StudentController::class, 'passwordChange']);
});

