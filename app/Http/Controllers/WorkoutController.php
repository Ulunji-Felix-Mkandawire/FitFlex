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
                $workouts = Workout::with('workoutPlan')->OrderBy('created_at', 'desc')->paginate(4); 

                return view('pages.list-workouts', ['workouts' => $workouts]);
            }
        
        else
            {
                $workouts = Workout::with('workoutPlan')->where('exercise_name', $request->filter)->get();

                return view('pages.list-workouts', ['workouts' => $workouts]);
            }
    }

    public function findByID(int $id)
    {
        $workout = Workout::with('workoutPlan')->findOrFail($id);

        return view('pages.list-id', ['workout' => $workout]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'exercise_name' => ['required', 'string', 'min:3', 'max:50'],
            'sets' => ['required', 'integer', 'min:1'],
            'reps' => ['required', 'integer', 'min:1'],
            'weight_kg' => ['nullable', 'numeric', 'min:0', 'max:999.99'],
            'performed_on' => ['required', 'date'],
            'workout_plan_id' => ['nullable', 'exists:workout_plans,id']
        ]);
        
        Workout::create($validated);

        return redirect()->route('dashboard')->with('success', 'Workout added');
    }

    public function builder()
    {
        $workoutPlans = WorkoutPlan::all();

        return view('pages.builder', ['workoutPlans' => $workoutPlans]);
    }

    public function library()
    {
        return view('pages.library');
    }

    public function settings()
    {
        return view('pages.settings');
    }
}
