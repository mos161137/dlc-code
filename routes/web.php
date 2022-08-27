<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\VoteController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\AjaxController;

Route::resource('/', HomeController::class);
Route::resource('home', HomeController::class);
Route::resource('vote', VoteController::class);
Route::resource('users', UsersController::class);
Route::resource('ajax', AjaxController::class);

