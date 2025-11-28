<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-beige-900 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-beige-200 overflow-hidden shadow-md shadow-beige-700/50 sm:rounded-lg">
                <div class="p-6 text-beige-900">
                    {{ __("Seja bem-vindo!") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>