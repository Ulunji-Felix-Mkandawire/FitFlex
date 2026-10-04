<x-layout>

    <div class="px-32">

        {{-- Loop here --}}

        <div class="flex flex-col gap-y-2.5 bg-surface my-2.5 p-2.5 border border-divider rounded-lg">
            <div>
                <p class="text-sm">Exercise Name: <span class="text-muted-text">{{ $workout->exercise_name }}</span></p>
            </div>
            {{-- Schedule should be its own table that will have a relationship with workouts --}}
            <div>
                <p class="self-center text-sm">Sets: <span class="text-muted-text">{{ $workout->sets }}</span></p>
            </div>

            <div>
                <p class="self-center text-sm">Repeatitons: <span class="text-muted-text">{{ $workout->reps }}</span></p>
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
                <p class="self-center text-sm">Date: <span class="text-muted-text">{{ $workout->performed_on }}</span>
                </p>
            </div>

            <div>
                <a href="{{ route('dashboard') }}" class="self-center text-blue-500 text-sm">Back</a>
            </div>

        </div>
    </div>

</x-layout>
