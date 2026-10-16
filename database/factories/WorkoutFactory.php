<?php

namespace Database\Factories;

use App\Models\Exercise;
use App\Models\Workout;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Workout>
 */
class WorkoutFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'sets' => fake()->numberBetween(3, 5),
            'reps' => fake()->numberBetween(3, 12),
            'weight_kg' => fake()->optional(0.8)->randomFloat(2, 20, 140),
            'performed_on' => fake()->dateTimeBetween('-2 months', 'now'),
            'exercise_id' => Exercise::factory(),
        ];
    }
}
