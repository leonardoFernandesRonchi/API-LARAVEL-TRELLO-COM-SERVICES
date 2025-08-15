<?php

use App\Http\Controllers\ProjectsController;
use App\Http\Controllers\ProjectUsersController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::post('/users/login', [UserController::class, 'login']);
Route::post('/users', [UserController::class, 'create']);

Route::middleware('auth:sanctum')->group(function () {

    Route::post('/project', [ProjectsController::class, 'create']);

    Route::put('/project/{project}', [ProjectsController::class, 'update']);

    Route::delete('/project/{project}', [ProjectsController::class, 'destroy']);


    Route::post('/project/{project}/projectUser', [ProjectUsersController::class, 'create']);
    Route::delete('/project/{project}/projectUser/{projectUser}', [ProjectUsersController::class, 'destroy']);
    
});
