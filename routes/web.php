<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;

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


Route::get('/', [ProjectController::class, 'index']);
Route::post('/projects', [ProjectController::class, 'store']);
Route::get('/project/create', [ProjectController::class, 'create']);
Route::post('/projects/{project}', [ProjectController::class, 'update']);
Route::get('/project/show/{project}', [ProjectController::class, 'show']);
Route::get('/project/edit/{project}', [ProjectController::class, 'edit']);
Route::get('/project/delete/{project}', [ProjectController::class, 'destroy']);


