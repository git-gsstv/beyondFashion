@extends('layouts.app')

@section('content')
<h1 class="text-2xl font-bold mb-4">
    {{ $product->exists ? 'Editar Produto' : 'Novo Produto' }}
</h1>

<form method="POST" action="{{ $product->exists ? route('products.update',$product) : route('products.store') }}">
    @csrf
    @if($product->exists) @method('PUT') @endif

    <div class="mb-3">
        <label class="block font-medium">Nome</label>
        <input class="border p-2 w-full rounded" name="name" value="{{ old('name',$product->name) }}">
    </div>

    <div class="grid grid-cols-3 gap-2 mb-3">
        <div>
            <label class="block">Tamanho</label>
            <input class="border p-2 w-full rounded" name="size" value="{{ old('size',$product->size) }}">
        </div>

        <div>
            <label class="block">Cor</label>
            <input class="border p-2 w-full rounded" name="color" value="{{ old('color',$product->color) }}">
        </div>

        <div>
            <label class="block">Estoque</label>
            <input class="border p-2 w-full rounded" type="number" name="stock" value="{{ old('stock',$product->stock) }}">
        </div>
    </div>

    <div class="mb-3">
        <label class="block">Preço</label>
        <input class="border p-2 w-full rounded" name="price" value="{{ old('price',$product->price) }}">
    </div>

    <div class="mb-3">
        <label class="block">Descrição</label>
        <textarea class="border p-2 w-full rounded" name="description">{{ old('description',$product->description) }}</textarea>
    </div>

    <button class="bg-green-600 text-gray-700 px-4 py-2 rounded">Salvar</button>
    <a href="{{ route('products.index') }}" class="ml-3 text-gray-700">Cancelar</a>
</form>
@endsection
