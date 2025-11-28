<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-beige-900 leading-tight">
            {{ __('Categories') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-beige-900 overflow-hidden shadow-xl shadow-beige-700/50 sm:rounded-lg p-6 text-beige-50">

                <h1 class="text-2xl font-bold mb-4">Gerenciar Categorias</h1>

                <a href="{{ route('categories.create') }}" class="bg-beige-700 text-beige-50 px-4 py-2 rounded hover:bg-beige-800 transition mb-4 inline-block">
                    Nova Categoria +
                </a>

                @if(session('success'))
                    <div class="bg-beige-500 text-beige-50 p-2 mb-4 rounded">
                        {{ session('success') }}
                    </div>
                @endif

                <table class="w-full border-collapse">
                    <thead>
                        <tr class="bg-beige-800 text-left font-semibold text-beige-200">
                            <th class="p-3">Nome</th>
                            <th class="p-3">Descrição</th>
                            <th class="p-3">Produtos Relacionados</th>
                            <th class="p-3">Ações</th>
                        </tr>
                    </thead>

                    <tbody>
                        {{-- Presumindo que você passa $categories para a view --}}
                        @forelse($categories as $category)
                        <tr class="border-b border-beige-700 hover:bg-beige-800/80 transition">
                            <td class="p-3">{{ $category->nome }}</td>
                            <td class="p-3">{{ $category->descrição }}</td>
                            <td class="p-3">{{ $category->products_count ?? 'N/A' }}</td> {{-- Adapte este campo --}}
                            <td class="p-3 flex gap-2">
                                <a href="{{ route('categories.edit', $category) }}" class="text-beige-400 hover:text-beige-200">Editar</a>
                                
                                <form action="{{ route('categories.destroy', $category) }}" method="POST">
                                    @csrf @method('DELETE')
                                    <button class="text-red-500 hover:text-red-300" onclick="return confirm('Excluir?')">
                                        Excluir
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="p-3 text-center text-beige-500">
                                Nenhuma categoria encontrada.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</x-app-layout>