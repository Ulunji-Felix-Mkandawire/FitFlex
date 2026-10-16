<x-layout>
    <div class="px-4 md:px-12 lg:px-32 text-primary-text">

        {{-- Page heading --}}
        <div class="py-4">
            <h1 class="font-[Orbitron] text-xl">All Workouts</h1>
            <p class="mt-1 text-muted-text text-sm">
                View and manage your workout history.
            </p>
        </div>

        {{-- Workouts container --}}
        <div class="bg-surface border border-divider rounded-lg">

            {{-- Header and filter --}}
            <div class="flex md:flex-row flex-col md:justify-between md:items-center gap-3 px-4 py-3">

                <h2 class="font-[Orbitron] text-sm">
                    Workout Records
                    <span class="font-normal text-muted-text">
                        ({{ $workouts->total() }})
                    </span>
                </h2>

                <div class="flex items-center gap-3">

                    {{-- Exercise filter --}}
                    <form action="{{ route('dashboard') }}" method="GET" class="w-full md:w-48">
                        <select name="filter" id="filter" onchange="this.form.submit()"
                            class="bg-surface px-3 py-2 border border-divider rounded-lg outline-0 w-full text-sm">
                            <option value="All" @selected(request('filter', 'All') === 'All')>
                                All Exercises
                            </option>

                            @foreach ($exercises as $exercise)
                                <option value="{{ $exercise->id }}" @selected((string) request('filter') === (string) $exercise->id)>
                                    {{ $exercise->name }}
                                </option>
                            @endforeach
                        </select>
                    </form>

                    {{-- Add workout --}}
                    <a href="{{ route('builder') }}"
                        class="flex justify-center items-center hover:bg-divider border border-divider rounded-full w-9 h-9"
                        aria-label="Add workout" title="Add workout">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round">
                            <path d="M12 5v14M5 12h14" />
                        </svg>
                    </a>

                </div>
            </div>

            <hr class="border-divider" />

            {{-- Workout records --}}
            @if ($workouts->count() > 0)

                {{-- Table headings --}}
                <div class="hidden gap-3 md:grid md:grid-cols-7 px-4 py-3 font-[Orbitron] text-muted-text text-xs">

                    <div>Name</div>
                    <div>Sets</div>
                    <div>Reps</div>
                    <div>Weight (Kg)</div>
                    <div>Plan</div>
                    <div>Date</div>
                    <div>Details</div>

                </div>

                {{-- Loop through workouts --}}
                @foreach ($workouts as $workout)
                    <hr class="border-divider" />

                    <div class="items-center gap-3 grid grid-cols-2 md:grid-cols-7 px-4 py-3">

                        {{-- Exercise name --}}
                        <div class="flex items-center gap-2 min-w-0">
                            <div class="bg-divider p-1.5 rounded-full shrink-0">
                                <svg xmlns="http://www.w3.org/2000/svg" class="size-3" viewBox="0 0 24 24">
                                    <path fill="currentColor"
                                        d="M20.57 14.86L22 13.43L20.57 12L17 15.57L8.43 7L12 3.43L10.57 2L9.14 3.43L7.71 2L5.57 4.14L4.14 2.71L2.71 4.14l1.43 1.43L2 7.71l1.43 1.43L2 10.57L3.43 12L7 8.43L15.57 17L12 20.57L13.43 22l1.43-1.43L16.29 22l2.14-2.14l1.43 1.43l1.43-1.43l-1.43-1.43L22 16.29z" />
                                </svg>
                            </div>

                            <div class="min-w-0">
                                <p class="md:hidden text-muted-text text-xs">
                                    Exercise
                                </p>
                                <p class="text-sm wrap-break-words">
                                    {{ $workout->exercise?->name ?? 'N/A' }}
                                </p>
                            </div>
                        </div>

                        {{-- Sets --}}
                        <div>
                            <p class="md:hidden text-muted-text text-xs">Sets</p>
                            <p class="text-sm">
                                {{ $workout->sets ?? 'N/A' }}
                            </p>
                        </div>

                        {{-- Reps --}}
                        <div>
                            <p class="md:hidden text-muted-text text-xs">Reps</p>
                            <p class="text-sm">
                                {{ $workout->reps ?? 'N/A' }}
                            </p>
                        </div>

                        {{-- Weight --}}
                        <div>
                            <p class="md:hidden text-muted-text text-xs">
                                Weight (Kg)
                            </p>
                            <p class="text-sm">
                                {{ $workout->weight_kg !== null ? $workout->weight_kg : 'N/A' }}
                            </p>
                        </div>

                        {{-- Workout plan --}}
                        <div>
                            <p class="md:hidden text-muted-text text-xs">Plan</p>
                            <p class="text-sm wrap-break-words">
                                {{ $workout->workoutPlan?->name ?? 'N/A' }}
                            </p>
                        </div>

                        {{-- Date --}}
                        <div>
                            <p class="md:hidden text-muted-text text-xs">Date</p>
                            <p class="text-sm">
                                {{ $workout->performed_on ? \Illuminate\Support\Carbon::parse($workout->performed_on)->format('M j, Y') : 'N/A' }}
                            </p>
                        </div>

                        {{-- Details link --}}
                        <div>
                            <p class="md:hidden text-muted-text text-xs">
                                Details
                            </p>
                            <a href="{{ route('workouts.show', $workout) }}"
                                class="text-blue-500 text-sm hover:underline">
                                View details
                            </a>
                        </div>

                    </div>
                @endforeach
            @else
                {{-- Empty state --}}
                <div class="px-4 py-12 text-center">
                    <h3 class="font-[Orbitron] text-sm">
                        No workouts found
                    </h3>

                    <p class="mt-2 text-muted-text text-sm">
                        @if (request()->filled('filter') && request('filter') !== 'All')
                            No workouts match the selected exercise.
                            Try another filter.
                        @else
                            You haven't recorded any workouts yet.
                        @endif
                    </p>

                    <a href="{{ route('builder') }}" class="inline-block mt-4 text-blue-500 text-sm hover:underline">
                        Add your first workout
                    </a>
                </div>

            @endif

        </div>

        {{-- Pagination --}}
        @if ($workouts->hasPages())
            <div class="mt-4">
                {{ $workouts->links() }}
            </div>
        @endif

    </div>
</x-layout>
