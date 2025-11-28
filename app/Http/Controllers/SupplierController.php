<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index()
    {
        $suppliers = Supplier::orderBy('nome')->get();
        return view('suppliers.index', compact('suppliers'));
    }

    public function create()
    {
        $supplier = new Supplier();
        return view('suppliers.create', compact('supplier'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:150',
            'telefone' => 'nullable|string|max:20',
            'cnpj' => 'required|string|max:18|unique:suppliers,cnpj',
            'endereco' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:suppliers,email',
        ]);

        Supplier::create($validated);

        return redirect()->route('suppliers.index')->with('success', 'Fornecedor criado com sucesso!');
    }

    public function edit(Supplier $supplier)
    {
        return view('suppliers.edit', compact('supplier'));
    }

    public function update(Request $request, Supplier $supplier)
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:150',
            'telefone' => 'nullable|string|max:20',
            'cnpj' => 'required|string|max:18|unique:suppliers,cnpj,' . $supplier->id, // Ignora o CNPJ atual
            'endereco' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:suppliers,email,' . $supplier->id, // Ignora o Email atual
        ]);

        $supplier->update($validated);

        return redirect()->route('suppliers.index')->with('success', 'Fornecedor atualizado com sucesso!');
    }

    public function destroy(Supplier $supplier)
    {
        $supplier->delete();
        return redirect()->route('suppliers.index')->with('success', 'Fornecedor removido com sucesso!');
    }
}