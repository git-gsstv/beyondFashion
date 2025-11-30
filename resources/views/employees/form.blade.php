<form method="POST" action="{{ $employee->exists ? route('employees.update', $employee) : route('employees.store') }}" autocomplete="off">
    @csrf
    @if($employee->exists) @method('PUT') @endif

    @if ($errors->any())
        <div class="mb-4 p-4 text-sm text-red-800 rounded-lg bg-red-100 border border-red-300">
            <p class="font-bold mb-1">Por favor, corrija os seguintes erros:</p>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    <div class="grid grid-cols-3 gap-4 mb-3">
        <div>
            <label class="block font-medium text-beige-900 mb-1">Nome</label>
            <input class="border border-beige-500 p-2 w-full rounded focus:ring-beige-600 focus:border-beige-600 bg-beige-100 text-beige-900" 
                   name="nome" 
                   value="{{ old('nome', $employee->nome) }}">
            @error('nome')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label class="block font-medium text-beige-900 mb-1">Cargo</label>
            <input class="border border-beige-500 p-2 w-full rounded focus:ring-beige-600 focus:border-beige-600 bg-beige-100 text-beige-900" 
                   name="cargo" 
                   value="{{ old('cargo', $employee->cargo) }}">
            @error('cargo')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label class="block font-medium text-beige-900 mb-1">Turno</label>
            <select class="border border-beige-500 p-2 w-full rounded focus:ring-beige-600 focus:border-beige-600 bg-beige-100 text-beige-900" name="turno">
                <option value="">Selecione o Turno</option>
                @foreach($turnos as $turno)
                    <option value="{{ $turno }}"
                        @if(old('turno', $employee->turno) == $turno)
                            selected
                        @endif
                    >
                        {{ $turno }}
                    </option>
                @endforeach
            </select>
            @error('turno')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>
    </div>

    <button class="bg-beige-700 text-beige-50 px-5 py-2 rounded-lg hover:bg-beige-800 transition shadow-md shadow-beige-800/50">
        Salvar
    </button>
    
    <a href="{{ route('employees.index') }}" class="ml-4 text-beige-700 hover:text-beige-900 font-medium">Cancelar</a>
</form>