<h1 class="text-2xl font-bold mb-4 text-beige-900">
    {{ $product->exists ? 'Editar Produto' : 'Novo Produto' }}
</h1>

<form method="POST" action="{{ $product->exists ? route('products.update',$product) : route('products.store') }}" autocomplete="off">
    @csrf
    @if($product->exists) @method('PUT') @endif

    <div class="mb-3">
        <label class="block font-medium text-beige-800 mb-1">Nome</label>
        <input class="border border-beige-500 p-2 w-full rounded focus:ring-beige-600 focus:border-beige-600 bg-beige-100 text-beige-900" name="name" value="{{ old('name',$product->name) }}">
    </div>

    <div class="grid grid-cols-3 gap-4 mb-3">
        <div>
            <label class="block font-medium text-beige-800 mb-1">Tamanho</label>
            <input class="border border-beige-500 p-2 w-full rounded focus:ring-beige-600 focus:border-beige-600 bg-beige-100 text-beige-900" name="size" value="{{ old('size',$product->size) }}">
        </div>

        <div>
            <label class="block font-medium text-beige-800 mb-1">Cor</label>
            <input class="border border-beige-500 p-2 w-full rounded focus:ring-beige-600 focus:border-beige-600 bg-beige-100 text-beige-900" name="color" value="{{ old('color',$product->color) }}">
        </div>

        <div>
            <label class="block font-medium text-beige-800 mb-1">Estoque</label>
            <input class="border border-beige-500 p-2 w-full rounded focus:ring-beige-600 focus:border-beige-600 bg-beige-100 text-beige-900" type="number" name="stock" value="{{ old('stock',$product->stock) }}">
        </div>
    </div>

    <div class="mb-3">
        <label class="block font-medium text-beige-800 mb-1">Categorias</label>
        <select name="categories[]" multiple 
            class="border border-beige-500 p-2 w-full rounded focus:ring-beige-600 focus:border-beige-600 bg-beige-100 text-beige-900 h-32">
            
            @foreach($categories as $category)
                @php
                    $selected = (isset($product) && $product->categories->contains($category->id)) ? 'selected' : '';
                @endphp
                
                <option value="{{ $category->id }}" {{ $selected }}>
                    {{ $category->nome }}
                </option>
            @endforeach
        </select>
        <p class="text-sm text-beige-600 mt-1">Selecione uma ou mais categorias (segure Ctrl/Cmd).</p>
    </div>

    <div class="mb-3">
        <label class="block font-medium text-beige-800 mb-1">Preço</label>
        <input class="border border-beige-500 p-2 w-full rounded focus:ring-beige-600 focus:border-beige-600 bg-beige-100 text-beige-900" name="price" value="{{ old('price',$product->price) }}">
    </div>

    <div class="mb-5">
        <label class="block font-medium text-beige-800 mb-1">Descrição</label>
        <textarea class="border border-beige-500 p-2 w-full rounded focus:ring-beige-600 focus:border-beige-600 bg-beige-100 text-beige-900" name="description">{{ old('description',$product->description) }}</textarea>
    </div>

    <button class="bg-beige-700 text-beige-50 px-5 py-2 rounded-lg hover:bg-beige-800 transition shadow-md shadow-beige-800/50">
        Salvar
    </button>
    
    <a href="{{ route('products.index') }}" class="ml-4 text-beige-700 hover:text-beige-900 font-medium">Cancelar</a>
</form>