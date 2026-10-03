<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>FitFlex</title>

        {{-- Favicon --}}
        <link rel="icon" type="image/png" href="/favicon-96x96.png" sizes="96x96" />
        <link rel="icon" type="image/svg+xml" href="/favicon.svg" />
        <link rel="shortcut icon" href="/favicon.ico" />
        <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png" />
        <link rel="manifest" href="/site.webmanifest" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>

    <body class="bg-canvas text-primary-text">
        <header class="flex justify-between items-center px-32 py-2.5 border-b border-b-surface text-sm">
            {{-- logo & app name --}}
            <div class="flex items-center gap-x-1">
                <img src="{{ asset('images/FitFlexPlus.png') }}" alt="FitFlex Logo" class="size-8" />
                <h3 class="font-[Orbitron] font-medium text-primary-text">FitFlex</h3>
            </div>
            {{-- links --}}
            <nav class="flex gap-x-2.5">

                <a href="{{ route('dashboard') }}"
                    class="{{ request()->is('/') ? 'text-primary-text' : 'text-gray-700' }}">Dashboard</a>

                <a href="{{ route('builder') }}"
                    class="{{ request()->is('builder') ? 'text-primary-text' : 'text-gray-700' }}">Builder</a>

                <a href="{{ route('libray') }}"
                    class="{{ request()->is('libray') ? 'text-primary-text' : 'text-gray-700' }}">Library</a>

                <a href="{{ route('settings') }}"
                    class="{{ request()->is('settings') ? 'text-primary-text' : 'text-gray-700' }}">Settings</a>

            </nav>
            {{-- extras: profile --}}
            <div class="flex items-center gap-x-2.5">
                <form>
                    @csrf
                    <div class="flex items-center bg-surface rounded-2xl w-50">

                        <div class="pl-2">

                            <svg class="size-4" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M10 6.5C10 8.433 8.433 10 6.5 10C4.567 10 3 8.433 3 6.5C3 4.567 4.567 3 6.5 3C8.433 3 10 4.567 10 6.5ZM9.30884 10.0159C8.53901 10.6318 7.56251 11 6.5 11C4.01472 11 2 8.98528 2 6.5C2 4.01472 4.01472 2 6.5 2C8.98528 2 11 4.01472 11 6.5C11 7.56251 10.6318 8.53901 10.0159 9.30884L12.8536 12.1464C13.0488 12.3417 13.0488 12.6583 12.8536 12.8536C12.6583 13.0488 12.3417 13.0488 12.1464 12.8536L9.30884 10.0159Z"
                                    fill="currentColor" fill-rule="evenodd" clip-rule="evenodd"></path>
                            </svg>

                        </div>

                        <input type="text" name="search" class="px-1 py-1 outline-0" />

                    </div>
                </form>
                <div class="bg-gray-500 rounded-full size-6">
                    <img src="" class="" />
                </div>
            </div>
        </header>
        {{ $slot }}
    </body>

</html>
