<x-layout>

    <div class="px-32">
        <div class="bg-surface my-10 p-2.5 border border-divider rounded-lg">

            <h2 class="font-[Orbitron] text-center">Create Workout</h2>

            <form class="m-auto py-5 w-2/5">

                <div class="flex flex-col gap-y-2.5">
                    <div class="">
                        <input type="text" name="exercise_name" placeholder="Exercise Name"
                            class="px-2.5 py-1 border border-divider rounded-lg w-full" />
                    </div>
                    <div class="">
                        <input type="number" name="sets" placeholder="Sets"
                            class="px-2.5 py-1 border border-divider rounded-lg w-full" min="0" />
                    </div>
                    <div class="">
                        <input type="number" name="reps" placeholder="Reps"
                            class="px-2.5 py-1 border border-divider rounded-lg w-full" min="0" />
                    </div>
                    <div class="">
                        <input type="number" name="weight_kg" placeholder="Weight"
                            class="px-2.5 py-1 border border-divider rounded-lg w-full" min="0" />
                    </div>
                    <div class="">
                        <input type="date" name="performed_on" placeholder="Date"
                            class="px-2.5 py-1 border border-divider rounded-lg w-full" />
                    </div>
                </div>
            </form>
        </div>
    </div>

</x-layout>
