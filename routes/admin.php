<?php

use App\Http\Controllers\User\Auth\LoginController;
use App\Http\Controllers\User\DashboardController;
use App\Http\Controllers\User\ProjectController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['guest:web']], function () {
    Route::get('/', DashboardController::class)->name('home');
    Route::get('/login', [LoginController::class, 'showLoginForm']);

    Route::group(['prefix' => 'project'], function () {
        Route::get('/', [ProjectController::class, 'index']);
        Route::post('/', [ProjectController::class, 'store']);
        Route::get('/create', [ProjectController::class, 'create']);
        Route::get('/{project:slug}/edit', [ProjectController::class, 'edit']);
        Route::patch('/{project:slug}/update', [ProjectController::class, 'update']);
    });
});

Route::group(['prefix' => 'filemanager', 'middleware' => ['web']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});
