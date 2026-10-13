<x-layout>

    <div class="px-32">

        {{-- Loop here --}}

        <div class="">
            <div class="flex flex-col flex-1 gap-y-2.5 bg-surface my-2.5 p-2.5 border border-divider rounded-lg">

                <p class="self-center text-sm">Plan: {{ $plan?->name ?? '-' }} </p>
                <p class="self-center text-sm">Description: <span
                        class="text-muted-text">{{ $plan?->description ?? '-' }}</span></p>
            </div>

            {{-- Show all workouts for this plan --}}
            <div class="bg-surface border border-divider rounded-lg">
                {{-- title --}}
                <div class="px-1.5 py-2.5">
                    <div class="">
                        <h2 class="font-[Orbitron] text-sm">All Workouts</h2>
                    </div>
                </div>

                <hr class="text-divider" />

                {{-- title columns --}}
                <div class="gap-x-2.5 grid grid-cols-6 px-1.5 py-0.5 rounded-sm font-[Orbitron] text-gray-500 text-sm">
                    <h3>Name</h3>
                    <h3>Sets</h3>
                    <h3>Reps</h3>
                    <h3>Weight &lbrack;Kg&rbrack; </h3>
                    <h3>Date</h3>
                    <h3>Details</h3>
                </div>

                {{-- data columns --}}
                {{-- Loop here --}}
                @forelse ($plan->workouts as $workout)
                    <hr class="text-divider" />
                    <div class="gap-x-2.5 grid grid-cols-6 px-1.5 py-2">

                        {{-- only concerns first column --}}
                        <div class="flex items-center gap-x-1.5">
                            {{-- icon --}}
                            <div class="bg-divider p-1.5 rounded-full">
                                <svg xmlns="http://www.w3.org/2000/svg" class="size-3" viewBox="0 0 24 24">
                                    <title>gym</title>
                                    <path fill="currentColor"
                                        d="M20.57 14.86L22 13.43L20.57 12L17 15.57L8.43 7L12 3.43L10.57 2L9.14 3.43L7.71 2L5.57 4.14L4.14 2.71L2.71 4.14l1.43 1.43L2 7.71l1.43 1.43L2 10.57L3.43 12L7 8.43L15.57 17L12 20.57L13.43 22l1.43-1.43L16.29 22l2.14-2.14l1.43 1.43l1.43-1.43l-1.43-1.43L22 16.29z" />
                                </svg>
                            </div>

                            <p class="text-sm">{{ $workout->exercise_name }}</p>

                        </div>

                        <p class="self-center text-sm">{{ $workout->sets }}</p>
                        <p class="self-center text-sm">{{ $workout->reps }}</p>
                        @if ($workout->weight_kg === null)
                            <p class="self-center text-sm">N&sol;A</p>
                        @else
                            <p class="self-center text-sm">{{ $workout->weight_kg }}</p>
                        @endif

                        <p class="self-center text-sm">{{ $workout->performed_on->format('M j, Y') }}</p>

                        {{-- col 7 --}}
                        <a href="{{ route('workouts.show', $workout) }}"
                            class="self-center text-blue-500 text-sm">Show</a>
                    </div>
                @empty
                    <p class="py-2.5 text-sm text-center">No Workouts available</p>
                @endforelse

            </div>
        </div>
        <div class="mt-5 text-center">
            <a href="{{ route('plans.index') }}"
                class="bg-surface px-5 py-1.5 border border-divider rounded-lg text-blue-500 text-sm cursor-pointer">Back</a>
        </div>
    </div>

</x-layout>
