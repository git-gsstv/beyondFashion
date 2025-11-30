<h1 class="text-2xl font-bold mb-4 text-beige-900">
    {{ $supplier->exists ? 'Editar Fornecedor' : 'Novo Fornecedor' }}
</h1>

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

<form method="POST" action="{{ $supplier->exists ? route('suppliers.update',$supplier) : route('suppliers.store') }}" autocomplete="off">
    @csrf
    @if($supplier->exists) @method('PUT') @endif

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        
        <div class="mb-3">
            <label class="block font-medium text-beige-800 mb-1">Nome</label>
            <input class="border border-beige-500 p-2 w-full rounded focus:ring-beige-600 focus:border-beige-600 bg-beige-100 text-beige-900" 
                   name="nome" value="{{ old('nome', $supplier->nome) }}">
            @error('nome')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-3">
            <label class="block font-medium text-beige-800 mb-1">CNPJ</label>
            <input class="border border-beige-500 p-2 w-full rounded focus:ring-beige-600 focus:border-beige-600 bg-beige-100 text-beige-900" 
                   name="cnpj" value="{{ old('cnpj', $supplier->cnpj) }}">
            @error('cnpj')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-3">
            <label class="block font-medium text-beige-800 mb-1">E-mail</label>
            <input type="email" class="border border-beige-500 p-2 w-full rounded focus:ring-beige-600 focus:border-beige-600 bg-beige-100 text-beige-900" 
                   name="email" value="{{ old('email', $supplier->email) }}">
            @error('email')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-3">
            <label class="block font-medium text-beige-800 mb-1">Telefone</label>
            <input class="border border-beige-500 p-2 w-full rounded focus:ring-beige-600 focus:border-beige-600 bg-beige-100 text-beige-900" 
                   name="telefone" value="{{ old('telefone', $supplier->telefone) }}">
            @error('telefone')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>
        
    </div>

    <div class="mb-5">
        <label class="block font-medium text-beige-800 mb-1">Endereço</label>
        <textarea class="border border-beige-500 p-2 w-full rounded focus:ring-beige-600 focus:border-beige-600 bg-beige-100 text-beige-900" 
                  name="endereco">{{ old('endereco', $supplier->endereco) }}</textarea>
        @error('endereco')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <button class="bg-beige-700 text-beige-50 px-5 py-2 rounded-lg hover:bg-beige-800 transition shadow-md shadow-beige-800/50">
        Salvar
    </button>
    
    <a href="{{ route('suppliers.index') }}" class="ml-4 text-beige-700 hover:text-beige-900 font-medium">Cancelar</a>
</form>