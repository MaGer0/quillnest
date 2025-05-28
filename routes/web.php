<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::inertia('/login', 'Auth/Login');
Route::post('/login', [AuthController::class, 'login']);
Route::inertia('/signup', 'Auth/Register');
Route::post('/signup', [AuthController::class, 'signup']);
Route::inertia('/', 'Dashboard');
