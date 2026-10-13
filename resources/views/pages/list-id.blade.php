<x-layout>

    <div class="px-32">

        {{-- Loop here --}}

        <div class="flex gap-2.5">
            <div class="flex flex-col flex-1 gap-y-2.5 bg-surface my-2.5 p-2.5 border border-divider rounded-lg">

                <a href="{{ route('plans.index') }}" class="self-center text-sm">Plan:
                    {{ $workout->workoutPlan?->name ?? '-' }} </a>
                <p class="self-center text-sm">Description: <span
                        class="text-muted-text">{{ $workout->workoutPlan?->description ?? '-' }}</span></p>
            </div>
            <div class="flex flex-col flex-1 gap-y-2.5 bg-surface my-2.5 p-2.5 border border-divider rounded-lg">
                <div>
                    <p class="text-sm">Exercise Name: <span class="text-muted-text">{{ $workout->exercise_name }}</span>
                    </p>
                </div>

                <div>
                    <p class="self-center text-sm">Sets: <span class="text-muted-text">{{ $workout->sets }}</span></p>
                </div>

                <div>
                    <p class="self-center text-sm">Repeatitons: <span
                            class="text-muted-text">{{ $workout->reps }}</span></p>
                </div>

                @if ($workout->weight_kg === null)
                    <div>
                        <p class="self-center text-sm">Weight: <span class="text-muted-text">N&sol;A</span></p>
                    </div>
                @else
                    <div>
                        <p class="self-center text-sm">Weight: <span
                                class="text-muted-text">{{ $workout->weight_kg }}</span></p>
                    </div>
                @endif
                <div>
                    <p class="self-center text-sm">Date: <span
                            class="text-muted-text">{{ $workout->performed_on->format('M j, Y') }}</span>
                    </p>
                </div>

            </div>
        </div>
        <div class="mt-5 text-center">
            <a href="{{ route('dashboard') }}"
                class="bg-surface px-5 py-1.5 border border-divider rounded-lg text-blue-500 text-sm cursor-pointer">Back</a>
        </div>
    </div>

</x-layout>
