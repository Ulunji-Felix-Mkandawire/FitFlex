<?php

use App\Http\Controllers\WorkoutController;
use App\Http\Controllers\WorkoutPlanController;
use Illuminate\Support\Facades\Route;

Route::get('/', [WorkoutController::class, 'listWorkouts'])->name('dashboard');

Route::get('/workouts/{workout}', [WorkoutController::class, 'show'])->name('workouts.show');

Route::get('/builder', [WorkoutController::class, 'builder'])->name('builder');

Route::post('/store', [WorkoutController::class, 'store'])->name('store');

Route::resource('plans', WorkoutPlanController::class)->only(['index', 'create', 'store', 'show']);