<?php

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

Route::get('/', [\App\Http\Controllers\HomeController::class, 'home']);
Route::post('/users', [\App\Http\Controllers\UserController::class, 'store']);

Route::get('/articles', [\App\Http\Controllers\ArticlesController::class, 'liste']);

Route::get('/doc-api', [\App\Http\Controllers\DocController::class, 'swagger']);
