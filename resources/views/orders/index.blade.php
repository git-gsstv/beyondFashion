<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-beige-900 leading-tight">
            {{ __('Pedidos') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-beige-900 overflow-hidden shadow-xl shadow-beige-700/50 sm:rounded-lg p-6 text-beige-50">

                <h1 class="text-2xl font-bold mb-4">Gerenciar Pedidos</h1>

                <a href="{{ route('orders.create') }}" class="bg-beige-700 text-beige-50 px-4 py-2 rounded hover:bg-beige-800 transition mb-4 inline-block">
                    Novo Pedido +
                </a>

                @if(session('success'))
                    <div class="bg-beige-500 text-beige-50 p-2 mb-4 rounded">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="overflow-x-auto">
                    <table class="w-full border-collapse min-w-[700px]">
                        <thead>
                            <tr class="bg-beige-800 text-left font-semibold text-beige-200">
                                <th class="p-3">ID</th>
                                <th class="p-3">Cliente</th>
                                <th class="p-3">Vendedor</th>
                                <th class="p-3">Total</th>
                                <th class="p-3 hidden sm:table-cell">Pagamento</th>
                                <th class="p-3">Status</th>
                                <th class="p-3">Ações</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse($orders as $order)
                            <tr class="border-b border-beige-700 hover:bg-beige-800/80 transition">
                                <td class="p-3">{{ $order->id }}</td>
                                <td class="p-3">{{ $order->cliente_nome }}</td>
                                <td class="p-3">{{ $order->employee->nome ?? 'N/A' }}</td>
                                <td class="p-3">R$ {{ number_format($order->total, 2, ',', '.') }}</td>
                                <td class="p-3 hidden sm:table-cell">{{ $order->forma_pagamento }}</td>
                                <td class="p-3">
                                    <span class="px-2 py-1 text-xs font-semibold rounded 
                                        {{ $order->status == 'Pago' ? 'bg-green-600 text-white' : '' }}
                                        {{ $order->status == 'Pendente' ? 'bg-yellow-600 text-beige-900' : '' }}
                                        {{ $order->status == 'Cancelado' ? 'bg-red-600 text-white' : '' }}
                                        {{ $order->status == 'Enviado' ? 'bg-blue-600 text-white' : '' }}">
                                        {{ $order->status }}
                                    </span>
                                </td>
                                <td class="p-3 flex gap-2">
                                    <a href="{{ route('orders.edit', $order) }}" class="text-beige-400 hover:text-beige-200">Editar</a>
                                    
                                    <form action="{{ route('orders.destroy', $order) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir este pedido?');">
                                        @csrf @method('DELETE')
                                        <button class="text-red-500 hover:text-red-300">
                                            Excluir
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7" class="p-3 text-center text-beige-500">
                                    Nenhum pedido encontrado.
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="mt-4">
                    {{ $orders->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>