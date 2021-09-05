<?php

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

Route::group([
    'middleware' => ['api.logger', 'api.secure-by-apikey'],
], function () {
    Route::apiResource('users', \App\Http\Controllers\API\UserController::class)->only([
        'store', 'show', 'index', 'update', 'destroy'
    ]);

    Route::apiResource('articles', \App\Http\Controllers\API\ArticlesController::class)->only([
        'store', 'show', 'index', 'update', 'destroy'
    ]);

    Route::apiResource('article-status', \App\Http\Controllers\API\ArticleStatusController::class)->only([
        'index'
    ]);

});
