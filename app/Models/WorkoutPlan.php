<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class WorkoutPlan extends Model
{
    use HasFactory;
    
    protected $fillable = ['name', 'description'];

    public function workouts()
    {
        return $this->hasMany(Workout::class);
    }
}
