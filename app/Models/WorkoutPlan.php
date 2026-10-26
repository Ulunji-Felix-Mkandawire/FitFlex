<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkoutPlan extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description'];

    public function workouts()
    {
        return $this->hasMany(Workout::class);
    }

    public function exercises()
    {
        return $this->belongsToMany(Exercise::class)
            ->withPivot(['target_sets', 'target_reps', 'position'])
            ->withTimestamps()
            ->orderByPivot('position');
    }
}
