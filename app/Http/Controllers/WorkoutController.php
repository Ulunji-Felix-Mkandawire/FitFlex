<?php

namespace App\Http\Controllers;

use App\Models\Workout;
use Illuminate\Http\Request;

class WorkoutController extends Controller
{
    public function listWorkouts()
    {
        $workouts = Workout::OrderBy('created_at', 'desc')->get();

        return view('pages.list-workouts', ['workouts' => $workouts]);
    }
}
