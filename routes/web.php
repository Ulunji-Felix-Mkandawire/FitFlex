<?php

use App\Http\Controllers\WorkoutController;
use Illuminate\Support\Facades\Route;

Route::get('/', [WorkoutController::class, 'listWorkouts'])->name('list-workouts');
