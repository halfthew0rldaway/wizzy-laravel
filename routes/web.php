<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\PositionController;

Route::get('/', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate'])->name('login_process');
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard');

// Routes Employee
Route::get('/employee', [EmployeeController::class, 'index'])->name('emp');
Route::get('/employee/create', [EmployeeController::class, 'create'])->name('emp_create');
Route::post('/employee/store', [EmployeeController::class, 'store'])->name('emp_store');
Route::delete('/employee/delete/{id}', [EmployeeController::class, 'delete'])->name('emp_delete');
Route::get('/employee/edit/{id}', [EmployeeController::class, 'edit'])->name('emp_edit');

// Routes Position (Jabatan)
Route::get('/position', [PositionController::class, 'index'])->name('position');
Route::get('/position/create', [PositionController::class, 'create'])->name('position_create');
Route::post('/position/store', [PositionController::class, 'store'])->name('position_store');
Route::delete('/position/delete/{id}', [PositionController::class, 'delete'])->name('position_delete');

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');