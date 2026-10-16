<?php

namespace Database\Factories;

use App\Models\Exercise;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Exercise>
 */
class ExerciseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->unique()->words(2, true),
            'muscle_group' => fake()->randomElement(['Chest', 'Back', 'Legs', 'Shoulders', 'Arms', 'Core']),
            'equipment' => fake()->optional()->randomElement(['Barbell', 'Dumbbell', 'Cable machine']),
        ];
    }
}
