<form method="POST" action="{{ $order->exists ? route('orders.update', $order) : route('orders.store') }}" autocomplete="off">
    @csrf
    @if($order->exists) @method('PUT') @endif

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
    
    <div class="grid grid-cols-2 gap-4 mb-3">
        <div>
            <label class="block font-medium text-beige-900 mb-1">Nome do Cliente</label>
            <input class="border border-beige-500 p-2 w-full rounded focus:ring-beige-600 focus:border-beige-600 bg-beige-100 text-beige-900" 
                   name="cliente_nome" 
                   value="{{ old('cliente_nome', $order->cliente_nome) }}">
            @error('cliente_nome')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label class="block font-medium text-beige-900 mb-1">Vendedor (Funcionário)</label>
            <select class="border border-beige-500 p-2 w-full rounded focus:ring-beige-600 focus:border-beige-600 bg-beige-100 text-beige-900" name="vendedor_id">
                <option value="">Selecione um vendedor</option>
                @foreach($vendedores as $vendedor)
                    <option value="{{ $vendedor->id }}"
                        @if(old('vendedor_id', $order->vendedor_id) == $vendedor->id)
                            selected
                        @endif
                    >
                        {{ $vendedor->nome }}
                    </option>
                @endforeach
            </select>
            @error('vendedor_id')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>
    </div>
    
    <div class="grid grid-cols-3 gap-4 mb-3">
        <div>
            <label class="block font-medium text-beige-900 mb-1">Status</label>
            <select class="border border-beige-500 p-2 w-full rounded focus:ring-beige-600 focus:border-beige-600 bg-beige-100 text-beige-900" name="status">
                <option value="">Selecione o Status</option>
                @foreach($statusOptions as $status)
                    <option value="{{ $status }}"
                        @if(old('status', $order->status) == $status)
                            selected
                        @endif
                    >
                        {{ $status }}
                    </option>
                @endforeach
            </select>
            @error('status')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label class="block font-medium text-beige-900 mb-1">Forma de Pagamento</label>
            <select class="border border-beige-500 p-2 w-full rounded focus:ring-beige-600 focus:border-beige-600 bg-beige-100 text-beige-900" name="forma_pagamento">
                <option value="">Selecione a Forma</option>
                @foreach($paymentMethods as $payment)
                    <option value="{{ $payment }}"
                        @if(old('forma_pagamento', $order->forma_pagamento) == $payment)
                            selected
                        @endif
                    >
                        {{ $payment }}
                    </option>
                @endforeach
            </select>
            @error('forma_pagamento')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>
        
        <div>
            <label class="block font-medium text-beige-900 mb-1">Valor Total (R$)</label>
            <input class="border border-beige-500 p-2 w-full rounded focus:ring-beige-600 focus:border-beige-600 bg-beige-100 text-beige-900" 
                   name="total" 
                   value="{{ old('total', $order->total) }}">
            @error('total')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>
    </div>

    <button class="bg-beige-700 text-beige-50 px-5 py-2 rounded-lg hover:bg-beige-800 transition shadow-md shadow-beige-800/50">
        Salvar
    </button>
    
    <a href="{{ route('orders.index') }}" class="ml-4 text-beige-700 hover:text-beige-900 font-medium">Cancelar</a>
</form>