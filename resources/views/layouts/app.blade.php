<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>

    <body class="font-sans antialiased bg-beige-400 text-beige-900">

        <div class="min-h-screen">

            @include('layouts.navigation')

            @isset($header)
                <header class="shadow-sm bg-beige-300">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        <h2 class="font-semibold text-xl text-beige-900 leading-tight">
                            {{ $header }}
                        </h2>
                    </div>
                </header>
            @endisset

            <main class="py-6">
                {{ $slot }}
            </main>

        </div>

    </body>
</html>