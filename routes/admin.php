<?php

use App\Http\Controllers\User\Auth\LoginController;
use App\Http\Controllers\User\DashboardController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['guest:web']], function () {
    Route::get('/', DashboardController::class)->name('home');
    Route::get('/login', [LoginController::class, 'showLoginForm']);
});

Route::group(['prefix' => 'filemanager', 'middleware' => ['web']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});
