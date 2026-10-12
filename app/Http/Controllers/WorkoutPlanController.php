<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreWorkoutPlanRequest;
use App\Models\WorkoutPlan;
use Illuminate\Http\Request;

class WorkoutPlanController extends Controller
{
    /**
     * Display a listing of the workout plan.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new workout plan.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created workout plan in storage.
     */
    public function store(StoreWorkoutPlanRequest $request)
    {
        WorkoutPlan::create($request->validated());
    }

    /**
     * Display the specified workout plan.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified workout plan.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified workout plan in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified workout plan from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
