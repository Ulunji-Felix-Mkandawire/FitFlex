<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Workout;
use App\Models\WorkoutPlan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        $plans = collect([
            ['name' => 'Push Day', 'description' => 'Chest, shoulders, triceps'],
            ['name' => 'Pull Day', 'description' => 'Back, biceps'],
            ['name' => 'Leg Day', 'description' => 'Quads, hamstrings, glutes, calves'],
            ['name' => 'Full Body', 'description' => null],
        ])->map( fn($plan) => WorkoutPlan::create($plan) );

        Workout::factory()->count(40)->state( fn () => ['workout_plan_id' => fake()->boolean(85) ? $plans->random()->id : null, ])->create();
    }
}
