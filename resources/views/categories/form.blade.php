<h1 class="text-2xl font-bold mb-4 text-beige-900">
    {{ $category->exists ? 'Editar Categoria' : 'Nova Categoria' }}
</h1>

{{-- A tag FORM não tem estilo de fundo/sombra, pois isso é definido no create/edit.blade.php --}}
<form method="POST" action="{{ $category->exists ? route('categories.update',$category) : route('categories.store') }}" autocomplete="off">
    @csrf
    @if($category->exists) @method('PUT') @endif

    <div class="mb-3">
        <label class="block font-medium text-beige-800 mb-1">Nome</label>
        <input class="border border-beige-500 p-2 w-full rounded focus:ring-beige-600 focus:border-beige-600 bg-beige-100 text-beige-900" name="nome" value="{{ old('nome',$category->nome) }}" required>
    </div>

    <div class="mb-5">
        <label class="block font-medium text-beige-800 mb-1">Descrição (opcional)</label>
        <textarea class="border border-beige-500 p-2 w-full rounded focus:ring-beige-600 focus:border-beige-600 bg-beige-100 text-beige-900" name="descrição">{{ old('descrição',$category->descrição) }}</textarea>
    </div>

    <button class="bg-beige-700 text-beige-50 px-5 py-2 rounded-lg hover:bg-beige-800 transition shadow-md shadow-beige-800/50">
        Salvar
    </button>
    
    <a href="{{ route('categories.index') }}" class="ml-4 text-beige-700 hover:text-beige-900 font-medium">Cancelar</a>
</form>