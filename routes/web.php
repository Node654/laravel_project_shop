<?php

use Illuminate\Support\Facades\Route;

Route::get('/home', \App\Http\Controllers\Home\HomeController::class)->name('home');

require_once 'groups/auth.php';
