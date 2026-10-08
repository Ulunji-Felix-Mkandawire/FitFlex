<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Workout extends Model
{
    protected $fillable = [
        'exercise_name',
        'sets',
        'reps',
        'weight_kg',
        'performed_on',
        'workout_plan_id'
    ];

    public function workoutPlan()
    {
        return $this->belongsTo(WorkoutPlan::class);
    }
}
