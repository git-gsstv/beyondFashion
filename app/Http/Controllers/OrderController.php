<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Employee; // Precisamos do Model Employee
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        // Carrega o relacionamento 'employee' para evitar o problema N+1
        $orders = Order::with('employee')->latest()->paginate(10);
        return view('orders.index', compact('orders'));
    }

    private function getFormDependencies()
    {
        // Opções de Turno e Pagamento
        $statuses = ['Pendente', 'Pago', 'Enviado', 'Cancelado'];
        $payments = ['Crédito', 'Débito', 'Dinheiro', 'PIX'];
        
        // Funcionários para o select de quem fez a venda
        $employees = Employee::orderBy('nome')->get();
        
        return compact('statuses', 'payments', 'employees');
    }

    public function create()
    {
        $order = new Order();
        return view('orders.create', array_merge(compact('order'), $this->getFormDependencies()));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'cliente_nome' => 'required|string|max:150',
            'status' => 'required|in:Pendente,Pago,Enviado,Cancelado',
            'forma_pagamento' => 'required|in:Crédito,Débito,Dinheiro,PIX',
            'total' => 'required|numeric|min:0',
        ]);

        Order::create($validated);

        return redirect()->route('orders.index')->with('success', 'Pedido criado com sucesso!');
    }

    public function edit(Order $order)
    {
        return view('orders.edit', array_merge(compact('order'), $this->getFormDependencies()));
    }

    public function update(Request $request, Order $order)
    {
        $validated = $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'cliente_nome' => 'required|string|max:150',
            'status' => 'required|in:Pendente,Pago,Enviado,Cancelado',
            'forma_pagamento' => 'required|in:Crédito,Débito,Dinheiro,PIX',
            'total' => 'required|numeric|min:0',
        ]);

        $order->update($validated);

        return redirect()->route('orders.index')->with('success', 'Pedido atualizado com sucesso!');
    }

    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->route('orders.index')->with('success', 'Pedido removido com sucesso!');
    }
}