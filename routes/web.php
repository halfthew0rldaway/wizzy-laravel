<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\logincontroller;
use App\http\Controllers\DashboardController;

Route::get('/', [LoginController::class, 'index'])->name('login');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');