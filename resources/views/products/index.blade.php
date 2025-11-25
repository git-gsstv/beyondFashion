<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Products') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">

                <h1 class="text-2xl font-bold mb-4">Produtos</h1>

                <a href="{{ route('products.create') }}" 
                    class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 mb-4 inline-block">
                    Novo Produto +
                </a>

                @if(session('success'))
                    <div class="bg-green-100 text-green-800 p-2 mb-4 rounded">
                        {{ session('success') }}
                    </div>
                @endif

                <table class="w-full border-collapse">
                    <thead>
                        <tr class="bg-gray-200 text-left">
                            <th class="p-2">Nome</th>
                            <th class="p-2">Preço</th>
                            <th class="p-2">Estoque</th>
                            <th class="p-2">Ações</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($products as $p)
                        <tr class="border-b">
                            <td class="p-2">{{ $p->name }}</td>
                            <td class="p-2">R$ {{ number_format($p->price,2,',','.') }}</td>
                            <td class="p-2">{{ $p->stock }}</td>
                            <td class="p-2 flex gap-2">
                                <a href="{{ route('products.edit', $p) }}" class="text-blue-600">Editar</a>
                                
                                <form action="{{ route('products.destroy', $p) }}" method="POST">
                                    @csrf @method('DELETE')
                                    <button class="text-red-600" onclick="return confirm('Excluir?')">
                                        Excluir
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="p-2 text-center text-gray-500">
                                Nenhum produto encontrado.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</x-app-layout>
