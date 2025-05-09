<?php

use App\Http\Controllers\Frontend\AdminController;
use App\Http\Controllers\Frontend\InstructorController;
use App\Http\Controllers\Frontend\UserController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::group(['middleware' => ['role:Student']], function () {
        Route::get('/dashboard', [UserController::class, 'index'])->name('dashboard');
    });

    Route::group(['middleware' => ['role:Instructor'], 'prefix' => 'instructor', 'as' => 'instructor.'], function () {
        Route::get('/dashboard', [InstructorController::class, 'index'])->name('dashboard');
    });
});

Route::middleware('auth:admin')->group(function () {
    Route::group(['middleware' => ['role:Admin'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
        Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
    });
});

Route::middleware('auth.web_or_admin')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
require __DIR__ . '/admin.php';
