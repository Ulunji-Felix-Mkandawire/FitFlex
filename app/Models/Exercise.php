<?php

namespace App\Models;

use Database\Factories\ExerciseFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exercise extends Model
{
    /** @use HasFactory<ExerciseFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'muscle_group',
        'equipment',
    ];

    public function workouts()
    {
        return $this->hasMany(Workout::class);
    }
}
