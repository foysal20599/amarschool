<?php

use App\Http\Controllers\backEnd\AgentController;
use App\Http\Controllers\backEnd\ClassController;
use App\Http\Controllers\backEnd\HomeController;
use App\Http\Controllers\backEnd\SearchController;
use App\Http\Controllers\backEnd\AgentSearchController;
use App\Http\Controllers\backEnd\StudentController;
use App\Http\Controllers\backEnd\StudentForAdminController;
use App\Http\Controllers\backEnd\UnionController;
use App\Http\Controllers\BaseController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\backEnd\SubAdminController;
use App\Http\Controllers\backEnd\UploadController;
use App\Http\Controllers\backEnd\YoutubeVideoContorller;
use App\Http\Controllers\StudentPanelController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/', [BaseController::class, 'index']);
Route::get('/contact', [BaseController::class, 'contact']);
Route::get('/about', [BaseController::class, 'about']);

// login controller for  student
Route::get('/student/login', [LoginController::class, 'index']);

// ==========================backEnd admin panel===============================
Route::get('dashboard', [HomeController::class, 'index']);
Route::get('noaccess', [HomeController::class, 'noaccess']);

// ==========================backEnd admin, sub-admin, agent permission===============================
Route::group(['middleware' => ['AllAuth']], function(){
    Route::get('get-district-list', [UnionController::class, 'getDistrictList']);
    Route::get('get-upazila-list', [UnionController::class, 'getUpazilaList']);
    Route::get('get-unions-list', [UnionController::class, 'getUnionList']);
});

Route::group(['middleware' => ['admin']], function(){
    // union 
    Route::get('create/unions', [UnionController::class, 'index']);
    Route::post('store/union', [UnionController::class, 'store'])->name('store.union');
    Route::get('manage/union', [UnionController::class, 'manage']);
    Route::get('delete/union/{id}', [UnionController::class, 'delete']);
    Route::get('edit/union/{id}', [UnionController::class, 'edit']);
    Route::post('update/union/{id}', [UnionController::class, 'update']);

    Route::get('/get-all-data', [UnionController::class, 'fatchdataall']);

    // class
    Route::get('class/create/', [ClassController::class, 'index']);
    Route::post('class/store/', [ClassController::class, 'store'])->name('class.store');
    Route::get('class/manage/', [ClassController::class, 'manage']);
    Route::get('class/active/{id}', [ClassController::class, 'active']);
    Route::get('class/inactive/{id}', [ClassController::class, 'inactive']);
    Route::get('class/delete/{id}', [ClassController::class, 'delete']);
    Route::get('class/edit/{id}', [ClassController::class, 'edit']);
    Route::post('class/update/{id}', [ClassController::class, 'update']);

    // sub-admin
    Route::get('subadmin/create', [SubAdminController::class, 'index']);
    Route::post('subadmin/store', [SubAdminController::class, 'store'])->name('subadmin.store');
    Route::get('subadmin/manage', [SubAdminController::class, 'manage']);
    Route::get('subadmin/edit/{id}', [SubAdminController::class, 'edit']);
    Route::post('subadmin/update/{id}', [SubAdminController::class, 'update']);
    Route::get('subadmin/active/{id}', [SubAdminController::class, 'active']);
    Route::get('subadmin/inactive/{id}', [SubAdminController::class, 'inactive']);
    Route::get('subadmin/delete/{id}', [SubAdminController::class, 'delete']);

    // student for admin 
    Route::get('student/managefor/admin', [StudentForAdminController::class, 'manage']);
    Route::get('student/view/foradmin/{id}', [StudentForAdminController::class, 'view']);
    Route::get('student/edit/foradmin/{id}', [StudentForAdminController::class, 'edit']);
    Route::post('student/update/foradmin/{id}', [StudentForAdminController::class, 'update']);
    Route::get('student/active/foradmin/{id}', [StudentForAdminController::class, 'active']);
    Route::get('student/inactive/foradmin/{id}', [StudentForAdminController::class, 'inactive']);
    Route::get('student/delete/foradmin/{id}', [StudentForAdminController::class, 'delete']);

    // search controller 
    Route::get('student/search', [SearchController::class, 'getstudentSearch'])->name('search.student');
    Route::post('student/search', [SearchController::class, 'studentSearch'])->name('search.studentsearch');

    // agent search 
    Route::get('agent/search', [AgentSearchController::class, 'getagentSearch'])->name('agent.search');
    Route::post('agent/search', [AgentSearchController::class, 'agentSearch'])->name('agent.agentsearch');
    

});
// ==========================backEnd agent panel===============================
Route::group(['middleware' => ['agent']], function(){
    Route::get('student/create', [StudentController::class, 'index']);
    Route::post('student/store', [StudentController::class, 'store'])->name('student.store');
    Route::get('student/manage', [StudentController::class, 'manage']);
    Route::get('student/view/{id}', [StudentController::class, 'view']);
    Route::get('student/active/{id}', [StudentController::class, 'active']);
    Route::get('student/inactive/{id}', [StudentController::class, 'inactive']);
    Route::get('student/edit/{id}', [StudentController::class, 'edit']);
    Route::post('student/update/{id}', [StudentController::class, 'update']);
    Route::get('student/delete/{id}', [StudentController::class, 'delete']);

    
});

// ==========================backEnd admin and sub-admin show route===============================
Route::group(['middleware' => ['permessionsubadmin']], function(){
      // agent
    Route::get('agent/create', [AgentController::class, 'index']);
    Route::post('agent/store', [AgentController::class, 'store'])->name('agent.store');
    Route::get('agent/manage', [AgentController::class, 'manage']);
    Route::get('agent/active/{id}', [AgentController::class, 'active']);
    Route::get('agent/inactive/{id}', [AgentController::class, 'inactive']);
    Route::get('agent/view/{id}', [AgentController::class, 'view']);
    Route::get('agent/edit/{id}', [AgentController::class, 'edit']);
    Route::post('agent/update/{id}', [AgentController::class, 'update']);
    Route::get('agent/delete/{id}', [AgentController::class, 'delete']);
    Route::get('agent/student/list/{id}', [AgentController::class, 'studentList']);


    Route::get('youtube/video/upload', [YoutubeVideoContorller::class, 'index']);
    Route::post('youtube/video/store', [YoutubeVideoContorller::class, 'store'])->name('youtubevideo.store');
    Route::get('youtube/video/manage', [YoutubeVideoContorller::class, 'manage']);
    Route::get('youtube/video/active/{id}', [YoutubeVideoContorller::class, 'active']);
    Route::get('youtube/video/inactive/{id}', [YoutubeVideoContorller::class, 'inactive']);
    Route::get('youtube/video/delete/{id}', [YoutubeVideoContorller::class, 'delete']);
    Route::get('youtube/video/edit/{id}', [YoutubeVideoContorller::class, 'edit']);
    Route::post('youtube/video/update/{id}', [YoutubeVideoContorller::class, 'update']);
});

// check middleware 
Route::group(['middleware' => ['check']], function(){
    Route::get('video/create', [UploadController::class, 'index']);
    Route::post('video/upload', [UploadController::class, 'upload'])->name('upload.video');
    Route::get('video/manage', [UploadController::class, 'manage']);
    Route::get('video/active/{id}', [UploadController::class, 'active']);
    Route::get('video/inactive/{id}', [UploadController::class, 'inactive']);
    Route::get('video/delete/{id}', [UploadController::class, 'delete']);
    Route::get('video/edit/{id}', [UploadController::class, 'edit']);
    Route::post('video/update/{id}', [UploadController::class, 'update']);
});   

// ==========================backEnd sub-admin panel===============================
Route::group(['middleware' => ['subadmin']], function(){
    
});
// student
Route::group(['middleware' => ['Student']], function(){
    Route::get('all/course', [StudentPanelController::class, 'index']);
    Route::get('profile/edit', [StudentPanelController::class, 'profileEdit']);
    Route::post('profile/update/{id}', [StudentPanelController::class, 'profileUpdate']);
    Route::get('profile', [StudentPanelController::class, 'viewProfile']);  
    Route::get('change/password', [StudentPanelController::class, 'changePassword']);  
    Route::post('password/update/', [StudentPanelController::class, 'updatePassword'])->name('password.update');  
});


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('backEnd/index');
})->name('dashboard');
