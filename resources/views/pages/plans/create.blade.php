<x-layout>

    <div class="px-32">
        <div class="bg-surface my-10 p-2.5 border border-divider rounded-lg">

            <h2 class="font-[Orbitron] text-center">Create Workout Plan</h2>

            <form class="m-auto py-5 w-2/5" method="POST" action="{{ route('plans.store') }}">

                @csrf

                <div class="flex flex-col gap-y-2.5">
                    <div class="">
                        <input type="text" name="name" placeholder="Name"
                            class="px-2.5 py-1 border border-divider rounded-lg outline-0 w-full text-primary-text text-sm"
                            value="{{ old('name') }}" />
                        {{-- Errors --}}
                        @error('name')
                            <p class="mt-0.5 text-red-500 text-xs">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="">
                        <input type="text" name="description" placeholder="Description"
                            class="px-2.5 py-1 border border-divider rounded-lg outline-0 w-full text-primary-text text-sm"
                            value="{{ old('description') }}" />

                        @error('description')
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
