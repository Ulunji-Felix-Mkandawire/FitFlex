<x-layout>

    <div class="px-32">
        <div class="bg-surface my-10 p-2.5 border border-divider rounded-lg">

            <h2 class="font-[Orbitron] text-center">Create Workout</h2>

            <form class="m-auto py-5 w-2/5" method="POST" action="{{ route('store') }}">

                @csrf

                <div class="flex flex-col gap-y-2.5">
                    <div class="">
                        <input type="text" name="exercise_name" placeholder="Exercise Name"
                            class="px-2.5 py-1 border border-divider rounded-lg outline-0 w-full text-primary-text text-sm"
                            value="{{ old('exercise_name') }}" />
                        {{-- Errors --}}
                        @error('exercise_name')
                            <p class="mt-0.5 text-red-500 text-xs">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="">
                        <input type="number" name="sets" placeholder="Sets"
                            class="px-2.5 py-1 border border-divider rounded-lg outline-0 w-full text-primary-text text-sm"
                            min="1" value="{{ old('sets') }}" />

                        @error('sets')
                            <p class="mt-0.5 text-red-500 text-xs">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="">
                        <input type="number" name="reps" placeholder="Reps"
                            class="px-2.5 py-1 border border-divider rounded-lg outline-0 w-full text-primary-text text-sm"
                            min="1" value="{{ old('reps') }}" />

                        @error('reps')
                            <p class="mt-0.5 text-red-500 text-xs">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="">
                        <input type="number" name="weight_kg" placeholder="Weight"
                            class="px-2.5 py-1 border border-divider rounded-lg outline-0 w-full text-primary-text text-sm"
                            min="0" value="{{ old('weight_kg') }}" step="0.01" />

                        @error('weight_kg')
                            <p class="mt-0.5 text-red-500 text-xs">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="">
                        <input type="date" name="performed_on" placeholder="Date"
                            class="px-2.5 py-1 border border-divider rounded-lg outline-0 w-full text-gray-400 text-sm"
                            value="{{ old('performed_on') }}" />

                        @error('performed_on')
                            <p class="mt-0.5 text-red-500 text-xs">{{ $message }}</p>
                        @enderror
                    </div>
                    {{-- Plan --}}
                    <div class="">
                        <select name="workout_plan_id"
                            class="bg-surface px-1.5 py-0.5 border border-divider rounded-lg outline-0 w-full text-gray-400 text-sm cursor-pointer">
                            <option value="" disabled selected hidden>Select Workout Plan</option>
                            @foreach ($workoutPlans as $workoutPlan)
                                <option value="{{ $workoutPlan->id }}" @selected(old('workout_plan_id') == $workoutPlan->id)>
                                    {{ $workoutPlan->name }}</option>
                            @endforeach
                        </select>
                        @error('workout_plan_id')
                            <p class="mt-0.5 text-red-500 text-xs">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="text-center">
                        <button
                            class="px-5 py-1.5 border border-divider rounded-lg text-blue-500 text-sm cursor-pointer">Create</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

</x-layout>
