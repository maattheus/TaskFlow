<?php

use App\Http\Controllers\Api\v1\AuthController;
use App\Http\Controllers\Api\v1\ProjectController;
use App\Http\Controllers\Api\v1\UserController;
use Illuminate\Support\Facades\Route;

Route::prefix('auth')->group(function()
{

    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout']);

});

Route::prefix('user')->group(function()
{

    Route::post('/store', [UserController::class, 'create']);
    Route::get('/{id}', [UserController::class, 'getUserById'])->middleware('auth:sanctum');;

});

Route::group(['middleware' => ['auth:api']], function()
{

    Route::prefix('project')->group(function()
    {

        Route::get('', [ProjectController::class, 'getAllByUser']);
        Route::post('create', [ProjectController::class, 'create']);

    });

});