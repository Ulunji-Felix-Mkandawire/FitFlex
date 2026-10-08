<?php

namespace App\Http\Controllers;

use App\Models\Workout;
use App\Models\WorkoutPlan;
use Illuminate\Http\Request;

class WorkoutController extends Controller
{
    public function listWorkouts(Request $request)
    {
        if(!$request->filter || $request->filter === "All")
            {
                $workouts = Workout::with('WorkoutPlan')->OrderBy('created_at', 'desc')->get(); 

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
            'workout_plan_id' => ['nullable', 'integer']
        ]);
        
        Workout::create($validated);

        return redirect('/');
    }

    public function builder()
    {
        $workoutPlans = WorkoutPlan::all();

        return view('pages.builder', ['workoutPlans' => $workoutPlans]);
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
