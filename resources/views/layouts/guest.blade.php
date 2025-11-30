<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased">
        {{-- Fundo da página mais escuro: de bg-beige-200 para **bg-beige-300** --}}
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-beige-300">
            <div>
                <a href="/">
                    {{-- Logo em cor de contraste: Mantido text-beige-700 --}}
                    <x-application-logo class="w-20 h-20 fill-current text-beige-700" />
                </a>
            </div>

            {{-- Fundo do card mais claro (para contraste): de bg-beige-50 para **bg-beige-100** --}}
            <div class="w-full sm:max-w-md mt-6 px-6 py-8 bg-beige-100 shadow-xl overflow-hidden sm:rounded-lg">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>