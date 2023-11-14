<?php

use App\Models\Kozijnen;
use App\Models\Attributes;
use Illuminate\Support\Facades\Route;
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


Route::get('/', [ProjectController::class, 'index']);
Route::post('/projects', [ProjectController::class, 'store']);
Route::get('/project/create', [ProjectController::class, 'create']);
Route::post('/projects/{project}', [ProjectController::class, 'update']);
Route::get('/project/{project}', [ProjectController::class, 'show']);
Route::get('/project/edit/{project}', [ProjectController::class, 'edit']);
Route::get('/project/delete/{project}', [ProjectController::class, 'destroy']);

Route::post('/kozijnen', [KozijnenController::class, 'store']);
Route::get('/kozijn/delete/{kozijnen}', [KozijnenController::class, 'destroy']);


Route::post('/attributes/{kozijnen}', [AttributeController::class, 'store']);
Route::get('/attribute/delete/{attributes}', [AttributeController::class, 'destroy']);



Route::get('/admin', function () {
    $kozijnen = Kozijnen::paginate(10);
    $attributes = Attributes::get();
    return view('admin', compact('kozijnen','attributes'));
});