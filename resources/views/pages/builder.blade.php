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
                    </div>
                    <div class="">
                        <input type="number" name="sets" placeholder="Sets"
                            class="px-2.5 py-1 border border-divider rounded-lg outline-0 w-full text-primary-text text-sm"
                            min="0" value="{{ old('sets') }}" />
                    </div>
                    <div class="">
                        <input type="number" name="reps" placeholder="Reps"
                            class="px-2.5 py-1 border border-divider rounded-lg outline-0 w-full text-primary-text text-sm"
                            min="0" value="{{ old('reps') }}" />
                    </div>
                    <div class="">
                        <input type="number" name="weight_kg" placeholder="Weight"
                            class="px-2.5 py-1 border border-divider rounded-lg outline-0 w-full text-primary-text text-sm"
                            min="0" value="{{ old('weight_kg') }}" />
                    </div>
                    <div class="">
                        <input type="date" name="performed_on" placeholder="Date"
                            class="px-2.5 py-1 border border-divider rounded-lg outline-0 w-full text-primary-text text-sm"
                            value="{{ old('performed_on') }}" />
                    </div>
                    <div class="text-center">
                        <button
                            class="px-5 py-1.5 border border-divider rounded-lg text-blue-500 text-sm">Create</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

</x-layout>
