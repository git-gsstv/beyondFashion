<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

use App\Http\Requests\ProductStoreRequest; 
use App\Http\Requests\ProductUpdateRequest;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::orderBy('name')->paginate(12);
        return view('products.index', compact('products'));
    }

    public function create()
    {
        // Adicione a inicialização de Produto
        $product = new \App\Models\Product(); 
        $categories = \App\Models\Category::all();
        
        // Supondo que você precisa de suppliers também
        $suppliers = \App\Models\Supplier::all(); 
        
        return view('products.create', compact('product', 'categories', 'suppliers'));
    }

    public function store(ProductStoreRequest $request)
    {
        $data = $request->validated();
        
        $product = Product::create(Arr::except($data, ['categories'])); 
        
        $product->categories()->sync($data['categories']); 
        
        return redirect()->route('products.index')->with('success', 'Produto criado com sucesso.');
    }

    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    public function edit(Product $product)
    {
        $categories = \App\Models\Category::all();
        $suppliers = \App\Models\Supplier::all();
        return view('products.edit', compact('product', 'categories', 'suppliers'));
    }

    public function update(ProductUpdateRequest $request, Product $product)
    {
        $data = $request->validated();

        $product->update(Arr::except($data, ['categories']));

        $product->categories()->sync($data['categories']);

        return redirect()->route('products.index')->with('success', 'Produto atualizado com sucesso.');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('success','Produto removido.');
    }
}