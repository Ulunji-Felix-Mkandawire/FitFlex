<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreWorkoutRequest;
use App\Models\Exercise;
use App\Models\Workout;
use App\Models\WorkoutPlan;
use Illuminate\Http\Request;

class WorkoutController extends Controller
{
    public function listWorkouts(Request $request)
    {
        $workouts = Workout::with(['workoutPlan', 'exercise'])
            ->when(
                $request->filled('filter') && $request->filter !== 'All',
                fn ($query) => $query->where('exercise_id', $request->filter)
            )
            ->latest('performed_on')
            ->latest('id')
            ->paginate(4)
            ->withQueryString();

        $exercises = Exercise::orderBy('name')->get();

        return view('pages.list-workouts', compact('workouts', 'exercises'));
    }

    public function show(Workout $workout)
    {
        $workout->load(['workoutPlan', 'exercise']);

        return view('pages.list-id', ['workout' => $workout]);
    }

    public function store(StoreWorkoutRequest $request)
    {
        Workout::create($request->validated());

        return redirect()->route('dashboard')->with('success', 'Workout added');
    }

    public function builder()
    {
        return view('pages.builder', [
            'exercises' => Exercise::orderBy('name')->get(),
            'workoutPlans' => WorkoutPlan::orderBy('name')->get(),
        ]);
    }
}
