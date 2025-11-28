<h1 class="text-2xl font-bold mb-4 text-beige-900">
    {{ $employee->exists ? 'Editar Funcionário' : 'Novo Funcionário' }}
</h1>

<form method="POST" action="{{ $employee->exists ? route('employees.update',$employee) : route('employees.store') }}" autocomplete="off">
    @csrf
    @if($employee->exists) @method('PUT') @endif

    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        
        <div class="mb-3 md:col-span-1">
            <label class="block font-medium text-beige-800 mb-1">Nome</label>
            <input class="border border-beige-500 p-2 w-full rounded focus:ring-beige-600 focus:border-beige-600 bg-beige-100 text-beige-900" 
                   name="nome" value="{{ old('nome', $employee->nome) }}" required>
        </div>

        <div class="mb-3 md:col-span-1">
            <label class="block font-medium text-beige-800 mb-1">Cargo</label>
            <input class="border border-beige-500 p-2 w-full rounded focus:ring-beige-600 focus:border-beige-600 bg-beige-100 text-beige-900" 
                   name="cargo" value="{{ old('cargo', $employee->cargo) }}" required>
        </div>

        <div class="mb-3 md:col-span-1">
            <label class="block font-medium text-beige-800 mb-1">Turno</label>
            {{-- O Controller passa a variável $shifts = ['Manhã', 'Tarde', 'Noite'] --}}
            <select name="turno" required
                    class="border border-beige-500 p-2 w-full rounded focus:ring-beige-600 focus:border-beige-600 bg-beige-100 text-beige-900">
                @foreach($shifts as $shift)
                    <option value="{{ $shift }}" {{ old('turno', $employee->turno) == $shift ? 'selected' : '' }}>
                        {{ $shift }}
                    </option>
                @endforeach
            </select>
        </div>
        
    </div> 

    <button class="bg-beige-700 text-beige-50 px-5 py-2 rounded-lg hover:bg-beige-800 transition shadow-md shadow-beige-800/50 mt-4">
        Salvar
    </button>
    
    <a href="{{ route('employees.index') }}" class="ml-4 text-beige-700 hover:text-beige-900 font-medium mt-4 inline-block">Cancelar</a>
</form>