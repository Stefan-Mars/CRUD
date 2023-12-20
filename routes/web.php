<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InfoController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AkkoordController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\KozijnenController;
use App\Http\Controllers\AttributeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
//Users
Route::redirect('/','/users/login');
Route::post('/users', [UserController::class, 'store']);
Route::middleware(['guest'])->group(function () {
    Route::post('/users/authenticate', [UserController::class, 'authenticate'])->middleware("guest");
    Route::get('/users/register', [UserController::class, 'create'])->middleware("guest");
    Route::get('/users/login', [UserController::class, 'login'])->name('login')->middleware("guest");
});

Route::middleware(['auth'])->group(function () {
    //Users
    Route::get('/users/show', [UserController::class, 'show'])->middleware("auth");
    Route::post('/users/update', [UserController::class, 'update'])->middleware("auth");
    Route::get('/users/logout', [UserController::class, 'logout'])->middleware("auth");
    //Projects
    Route::get('/home', [ProjectController::class, 'index']);
    Route::group(['middleware' => ['can:makeProject']], function () {
        Route::post('/projects', [ProjectController::class, 'store']);
        Route::get('/project/create', [ProjectController::class, 'create']);
        Route::put('/projects/{project}', [ProjectController::class, 'update']);
        Route::get('/project/edit/{project}', [ProjectController::class, 'edit']);
        Route::get('/project/{project}', [ProjectController::class, 'show']);
        Route::delete('/project/{project}', [ProjectController::class, 'destroy']);
        //Project Akkoord
        Route::post('/project/akkoords/{project}', [AkkoordController::class, 'store']);
        Route::get('/project/akkoord/{project}', [AkkoordController::class, 'create']);
        Route::put('/project/akkoord/{project}', [AkkoordController::class, 'update']);
        Route::get('/project/akkoord/edit/{project}', [AkkoordController::class, 'edit']);
        Route::get('/project/akkoord/download/{project}', [AkkoordController::class, 'download']);
        //Project Info
        Route::post('/project/infos/{project}', [InfoController::class, 'store']);
        Route::get('/project/info/{project}', [InfoController::class, 'create']);
        Route::put('/project/info/{project}', [InfoController::class, 'update']);
        Route::get('/project/info/edit/{project}', [InfoController::class, 'edit']);
    }); 

    Route::middleware(['role:Admin'])->group(function () {
        //Admin
        Route::get('/admin', [AdminController::class, 'show']);
        Route::get('/admin/accounts', [AdminController::class, 'accounts']);
        Route::get('/admin/attributes', [AdminController::class, 'attributes']);
        Route::put('/admin/roles/{id}', [AdminController::class, 'roles']);
        //Kozijnen
        Route::post('/kozijnen', [KozijnenController::class, 'store']);
        Route::put('/kozijn/{kozijnen}', [KozijnenController::class, 'update']);
        Route::delete('/kozijn/{kozijnen}', [KozijnenController::class, 'destroy']);
        //Attributes    
        Route::post('/attributes/{kozijnen}', [AttributeController::class, 'store']);
        Route::delete('/attribute/{attributes}', [AttributeController::class, 'destroy']);
    });
});

