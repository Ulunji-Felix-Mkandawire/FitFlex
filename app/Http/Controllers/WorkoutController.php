<?php

namespace App\Http\Controllers;

use App\Models\Workout;
use Illuminate\Http\Request;

class WorkoutController extends Controller
{
    public function listWorkouts(Request $request)
    {
        if(!$request->filter || $request->filter === "All")
            {
                $workouts = Workout::OrderBy('created_at', 'desc')->get(); 

                return view('pages.list-workouts', ['workouts' => $workouts]);
            }
        
        else
            {
                $workouts = Workout::where('exercise_name', $request->filter)->get();

                return view('pages.list-workouts', ['workouts' => $workouts]);
            }
    }

    public function findByID(int $id)
    {
        $workout = Workout::findOrFail($id);

        return view('pages.list-id', ['workout' => $workout]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'exercise_name' => ['required', 'string', 'min:3', 'max:50'],
            'sets' => ['required', 'integer', 'min:1'],
            'reps' => ['required', 'integer', 'min:1'],
            'weight_kg' => ['nullable', 'integer'],
            'performed_on' => ['required', 'date'],
        ]);
        
        Workout::create($validated);

        return redirect('/');
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
