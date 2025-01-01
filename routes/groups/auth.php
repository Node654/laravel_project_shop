<?php

use App\Http\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\Route;

Route::controller(AuthController::class)
    ->as('auth.')
    ->group(function () {
        Route::get('login', 'index')->name('login');
        Route::post('login', 'signIn')->name('sign-in');

        Route::get('sign-up', 'signUp')->name('sign-up');
        Route::post('sign-up', 'register')->name('register');

        Route::delete('logOut', 'logOut')->name('logOut');
    });
