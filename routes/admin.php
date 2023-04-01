<?php

use App\Http\Controllers\User\Auth\LogoutController;
use App\Http\Controllers\User\Auth\LoginController;
use App\Http\Controllers\User\DashboardController;
use App\Http\Controllers\User\ProjectController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['guest:web']], function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'process']);
});

Route::group(['middleware' => ['auth:web']], function () {
    Route::get('/', DashboardController::class)->name('home');

    Route::resource('project', ProjectController::class);

    Route::group(['prefix' => 'filemanager'], function () {
        \UniSharp\LaravelFilemanager\Lfm::routes();
    });

    Route::post('/logout', LogoutController::class);
});
