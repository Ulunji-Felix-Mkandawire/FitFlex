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

    public function findByID(int $id)
    {
        $workout = Workout::findOrFail($id);

        return view('pages.list-id', ['workout' => $workout]);
    }

    public function builder()
    {
        return view('pages.builder');
    }

    public function libray()
    {
        return view('pages.libray');
    }

    public function settings()
    {
        return view('pages.settings');
    }
}
