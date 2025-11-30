<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-beige-900 leading-tight">
            {{ __('Editar Pedido') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-beige-200 overflow-hidden shadow-md shadow-beige-500/50 sm:rounded-lg p-6">
                
                @include('orders.form', ['order' => $order])
                
            </div>
        </div>
    </div>
</x-app-layout>