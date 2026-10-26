<?php

namespace Database\Seeders;

use App\Models\Exercise;
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
        ])->map(fn ($plan) => WorkoutPlan::create($plan));

        $exercises = collect([
            ['name' => 'Bench Press', 'muscle_group' => 'Chest', 'equipment' => 'Barbell'],
            ['name' => 'Squat', 'muscle_group' => 'Legs', 'equipment' => 'Barbell'],
            ['name' => 'Deadlift', 'muscle_group' => 'Back', 'equipment' => 'Barbell'],
            ['name' => 'Overhead Press', 'muscle_group' => 'Shoulders', 'equipment' => 'Barbell'],
            ['name' => 'Barbell Row', 'muscle_group' => 'Back', 'equipment' => 'Barbell'],
            ['name' => 'Pull-up', 'muscle_group' => 'Back', 'equipment' => null],
            ['name' => 'Lat Pulldown', 'muscle_group' => 'Back', 'equipment' => 'Cable machine'],
            ['name' => 'Romanian Deadlift', 'muscle_group' => 'Legs', 'equipment' => 'Barbell'],
        ])->map(fn ($exercise) => Exercise::create($exercise));


        $ex = fn (string $name) => $exercises->firstWhere('name', $name)->id;

        $plans[0]->exercises()->attach([
            $ex('Bench Press')    => ['target_sets' => 4, 'target_reps' => 8,  'position' => 1],
            $ex('Overhead Press') => ['target_sets' => 3, 'target_reps' => 10, 'position' => 2],
        ]);
        
        $plans[1]->exercises()->attach([
            $ex('Deadlift')    => ['target_sets' => 4, 'target_reps' => 8,  'position' => 1],
            $ex('Lat Pulldown') => ['target_sets' => 3, 'target_reps' => 10, 'position' => 2],
        ]);
        
        $plans[2]->exercises()->attach([
            $ex('Squat')    => ['target_sets' => 4, 'target_reps' => 8,  'position' => 1],
            $ex('Romanian Deadlift') => ['target_sets' => 3, 'target_reps' => 10, 'position' => 2],
        ]);


        Workout::factory()
            ->count(40)
            ->state(fn () => [
                'exercise_id' => $exercises->random()->id,
                'workout_plan_id' => fake()->boolean(85) ? $plans->random()->id : null,
            ])
            ->create();
    }
}
