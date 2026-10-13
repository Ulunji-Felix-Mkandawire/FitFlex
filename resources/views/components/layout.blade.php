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
            <a href="{{ route('dashboard') }}" class="flex items-center gap-x-1">
                <img src="{{ asset('images/FitFlexPlus.png') }}" alt="FitFlex Logo" class="size-8" />
                <h3 class="font-[Orbitron] font-medium text-primary-text">FitFlex</h3>
            </a>
            {{-- links --}}
            <nav class="flex gap-x-2.5">

                <a href="{{ route('dashboard') }}"
                    class="{{ request()->is('/') ? 'text-primary-text' : 'text-gray-700' }}">Dashboard</a>

                <a href="{{ route('builder') }}"
                    class="{{ request()->is('builder') ? 'text-primary-text' : 'text-gray-700' }}">Builder</a>

                <a href="{{ route('plans.index') }}"
                    class="{{ request()->routeIs('plans.*') ? 'text-primary-text' : 'text-gray-700' }}">Plans</a>

            </nav>
        </header>
        {{-- Messages --}}
        @if (session('success'))
            <div class="px-32 py-2.5">
                <p class="text-green-500 text-sm">{{ session('success') }}</p>
            </div>
        @endif
        {{ $slot }}
    </body>

</html>
