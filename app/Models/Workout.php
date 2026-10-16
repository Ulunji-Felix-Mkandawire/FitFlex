<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Workout extends Model
{
    use HasFactory;

    protected $fillable = [
        'exercise_id',
        'sets',
        'reps',
        'weight_kg',
        'performed_on',
        'workout_plan_id',
    ];

    protected function casts(): array
    {
        return [
            'performed_on' => 'date',
            'weight_kg' => 'decimal:2',
        ];
    }

    public function workoutPlan()
    {
        return $this->belongsTo(WorkoutPlan::class);
    }

    public function exercise()
    {
        return $this->belongsTo(Exercise::class);
    }
}
