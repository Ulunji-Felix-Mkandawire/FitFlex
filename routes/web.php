<?php

use App\Http\Controllers\WorkoutController;
use Illuminate\Support\Facades\Route;

Route::get('/', [WorkoutController::class, 'listWorkouts'])->name('dashboard');

Route::get('/builder', [WorkoutController::class, 'builder'])->name('builder');

Route::get('/libray', [WorkoutController::class, 'libray'])->name('libray');

Route::get('/settings', [WorkoutController::class, 'settings'])->name('settings');