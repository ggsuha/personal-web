<?php

use App\Http\Controllers\User\Auth\LoginController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['guest:web']], function () {
    Route::get('/login', [LoginController::class, 'showLoginForm']);
});
