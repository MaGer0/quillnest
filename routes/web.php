<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;


// hanya untuk mengetest dan memahami pindah halaman di inertia
Route::get('/', function () {
    return Inertia::render('Dashboard');
});

Route::get('/login', fn() => Inertia::render('Auth/Login'));
Route::post('/login', [AuthController::class, 'login']);
