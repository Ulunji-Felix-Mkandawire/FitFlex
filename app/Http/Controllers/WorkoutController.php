<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreWorkoutRequest;
use App\Models\Workout;
use App\Models\WorkoutPlan;
use Illuminate\Http\Request;

class WorkoutController extends Controller
{
    public function listWorkouts(Request $request)
    {
        $workouts = Workout::with('workoutPlan')
            ->when(
                $request->filled('filter') && $request->filter !== 'All',
                fn ($query) => $query->where('exercise_name', $request->filter)
            )
            ->latest()
            ->paginate(4)
            ->withQueryString();

        $exerciseNames = Workout::distinct()->orderBy('exercise_name')->pluck('exercise_name');

        return view('pages.list-workouts', compact('workouts', 'exerciseNames'));
    }



    public function findByID(int $id)
    {
        $workout = Workout::with('workoutPlan')->findOrFail($id);

        return view('pages.list-id', ['workout' => $workout]);
    }

    public function store(StoreWorkoutRequest $request)
    {
        Workout::create($request->validated());

        return redirect()->route('dashboard')->with('success', 'Workout added');
    }

    public function builder()
    {
        $workoutPlans = WorkoutPlan::all();

        return view('pages.builder', ['workoutPlans' => $workoutPlans]);
    }
}
