<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Employee;
use Illuminate\Http\Request;
use App\Http\Requests\OrderStoreRequest;
use App\Http\Requests\OrderUpdateRequest;

class OrderController extends Controller
{
    private function getFormData()
    {
        $vendedores = Employee::all();
        $statusOptions = ['Pendente', 'Em Processamento', 'Enviado', 'Entregue', 'Cancelado'];
        $paymentMethods = ['Crédito', 'Débito', 'Pix', 'Dinheiro', 'Boleto'];
        
        return compact('vendedores', 'statusOptions', 'paymentMethods');
    }

    public function index()
    {
        $orders = Order::with('vendedor')->paginate(10);
        return view('orders.index', compact('orders'));
    }

    public function create()
    {
        $order = new Order();
        $formData = $this->getFormData();
        return view('orders.create', array_merge(compact('order'), $formData)); 
    }

    public function store(OrderStoreRequest $request)
    {
        Order::create($request->validated());

        return redirect()->route('orders.index')->with('success', 'Pedido criado com sucesso!');
    }

    public function show(Order $order)
    {
        return view('orders.show', compact('order'));
    }

    public function edit(Order $order)
    {
        $formData = $this->getFormData();
        return view('orders.edit', array_merge(compact('order'), $formData)); 
    }

    public function update(OrderUpdateRequest $request, Order $order)
    {
        $order->update($request->validated());

        return redirect()->route('orders.index')->with('success', 'Pedido atualizado com sucesso!');
    }

    public function destroy(Order $order)
    {
        $order->delete();

        return redirect()->route('orders.index')->with('success', 'Pedido excluído com sucesso!');
    }
}