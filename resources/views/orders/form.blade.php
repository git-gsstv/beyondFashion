<h1 class="text-2xl font-bold mb-4 text-beige-900">
    {{ $order->exists ? 'Editar Pedido #' . $order->id : 'Novo Pedido' }}
</h1>

<form method="POST" action="{{ $order->exists ? route('orders.update',$order) : route('orders.store') }}" autocomplete="off">
    @csrf
    @if($order->exists) @method('PUT') @endif

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        
        <div class="mb-3">
            <label class="block font-medium text-beige-800 mb-1">Nome do Cliente</label>
            <input class="border border-beige-500 p-2 w-full rounded focus:ring-beige-600 focus:border-beige-600 bg-beige-100 text-beige-900" 
                   name="cliente_nome" value="{{ old('cliente_nome', $order->cliente_nome) }}" required>
        </div>

        <div class="mb-3">
            <label class="block font-medium text-beige-800 mb-1">Vendedor (Funcionário)</label>
            <select name="employee_id" required
                    class="border border-beige-500 p-2 w-full rounded focus:ring-beige-600 focus:border-beige-600 bg-beige-100 text-beige-900">
                <option value="">Selecione um vendedor</option>
                @foreach($employees as $employee)
                    <option value="{{ $employee->id }}" {{ old('employee_id', $order->employee_id) == $employee->id ? 'selected' : '' }}>
                        {{ $employee->nome }} ({{ $employee->cargo }})
                    </option>
                @endforeach
            </select>
            @if($employees->isEmpty())
                <p class="text-red-500 text-sm mt-1">Nenhum funcionário cadastrado! Cadastre um primeiro.</p>
            @endif
        </div>
        
    </div> 

    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        
        <div class="mb-3">
            <label class="block font-medium text-beige-800 mb-1">Status</label>
            <select name="status" required
                    class="border border-beige-500 p-2 w-full rounded focus:ring-beige-600 focus:border-beige-600 bg-beige-100 text-beige-900">
                @foreach($statuses as $status)
                    <option value="{{ $status }}" {{ old('status', $order->status) == $status ? 'selected' : '' }}>
                        {{ $status }}
                    </option>
                @endforeach
            </select>
        </div>
        
        <div class="mb-3">
            <label class="block font-medium text-beige-800 mb-1">Forma de Pagamento</label>
            <select name="forma_pagamento" required
                    class="border border-beige-500 p-2 w-full rounded focus:ring-beige-600 focus:border-beige-600 bg-beige-100 text-beige-900">
                @foreach($payments as $payment)
                    <option value="{{ $payment }}" {{ old('forma_pagamento', $order->forma_pagamento) == $payment ? 'selected' : '' }}>
                        {{ $payment }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="block font-medium text-beige-800 mb-1">Valor Total (R$)</label>
            <input type="number" step="0.01" min="0"
                   class="border border-beige-500 p-2 w-full rounded focus:ring-beige-600 focus:border-beige-600 bg-beige-100 text-beige-900" 
                   name="total" value="{{ old('total', $order->total) }}" required>
        </div>
        
    </div>

    <button class="bg-beige-700 text-beige-50 px-5 py-2 rounded-lg hover:bg-beige-800 transition shadow-md shadow-beige-800/50 mt-4">
        Salvar
    </button>
    
    <a href="{{ route('orders.index') }}" class="ml-4 text-beige-700 hover:text-beige-900 font-medium mt-4 inline-block">Cancelar</a>
</form>