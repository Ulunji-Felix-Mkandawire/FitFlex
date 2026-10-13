<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreWorkoutPlanRequest;
use App\Models\WorkoutPlan;

class WorkoutPlanController extends Controller
{
    /**
     * Display a listing of the workout plan.
     */
    public function index()
    {
        $plans = WorkoutPlan::withCount('workouts')->orderBy('performed_on')->paginate(5);

        return view('pages.plans.index', ['plans' => $plans]);
    }

    /**
     * Show the form for creating a new workout plan.
     */
    public function create()
    {
        return view('pages.plans.create');
    }

    /**
     * Store a newly created workout plan in storage.
     */
    public function store(StoreWorkoutPlanRequest $request)
    {
        WorkoutPlan::create($request->validated());

        return redirect()->route('plans.index')->with('success', 'Workout Plan Added');
    }

    /**
     * Display the specified workout plan.
     */
    public function show(WorkoutPlan $plan)
    {

        $workouts = $plan->workouts()->latest('performed_on')->get();
        
        return view('pages.plans.show', compact('plan', 'workouts'));
    }

}
