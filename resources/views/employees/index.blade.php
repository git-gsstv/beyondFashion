<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-beige-900 leading-tight">
            {{ __('Funcionários') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-beige-900 overflow-hidden shadow-xl shadow-beige-700/50 sm:rounded-lg p-6 text-beige-50">

                <h1 class="text-2xl font-bold mb-4">Gerenciar Funcionários</h1>

                <a href="{{ route('employees.create') }}" class="bg-beige-700 text-beige-50 px-4 py-2 rounded hover:bg-beige-800 transition mb-4 inline-block">
                    Novo Funcionário +
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
                            <th class="p-3 hidden sm:table-cell">Cargo</th>
                            <th class="p-3">Turno</th>
                            <th class="p-3">Ações</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($employees as $employee)
                        <tr class="border-b border-beige-700 hover:bg-beige-800/80 transition">
                            <td class="p-3">{{ $employee->nome }}</td>
                            <td class="p-3 hidden sm:table-cell">{{ $employee->cargo }}</td>
                            <td class="p-3">{{ $employee->turno }}</td>
                            <td class="p-3 flex gap-2">
                                <a href="{{ route('employees.edit', $employee) }}" class="text-beige-400 hover:text-beige-200">Editar</a>
                                
                                <form action="{{ route('employees.destroy', $employee) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir este funcionário?');">
                                    @csrf @method('DELETE')
                                    <button class="text-red-500 hover:text-red-300">
                                        Excluir
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="p-3 text-center text-beige-500">
                                Nenhum funcionário encontrado.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</x-app-layout>