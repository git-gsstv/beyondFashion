<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-beige-900 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-beige-900 overflow-hidden shadow-xl shadow-black/30 sm:rounded-lg p-6">
                <div class="text-beige-50 text-lg">
                    Seja bem-vindo(a) ao painel de controle da sua loja!
                </div>
                <div class="mt-4 text-beige-300">
                    Use os links abaixo para gerenciar Produtos, Funcionários e Pedidos.
                </div>
            </div>

            <div class="mt-8 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                
                <a href="{{ route('products.index') }}" class="block p-6 bg-beige-200 rounded-lg shadow-md hover:bg-beige-300 transition duration-300 transform hover:scale-[1.02] border-b-4 border-beige-700">
                    <h3 class="text-xl font-semibold text-beige-900 mb-2">Gerenciar Produtos</h3>
                    <p class="text-beige-800">Crie, edite e organize todos os itens da sua loja.</p>
                </a>
                
                <a href="{{ route('employees.index') }}" class="block p-6 bg-beige-200 rounded-lg shadow-md hover:bg-beige-300 transition duration-300 transform hover:scale-[1.02] border-b-4 border-beige-700">
                    <h3 class="text-xl font-semibold text-beige-900 mb-2">Gerenciar Funcionários</h3>
                    <p class="text-beige-800">Mantenha o cadastro da sua equipe de vendas.</p>
                </a>

                <a href="{{ route('orders.index') }}" class="block p-6 bg-beige-200 rounded-lg shadow-md hover:bg-beige-300 transition duration-300 transform hover:scale-[1.02] border-b-4 border-beige-700">
                    <h3 class="text-xl font-semibold text-beige-900 mb-2">Visualizar Pedidos</h3>
                    <p class="text-beige-800">Acompanhe as vendas e status dos pedidos.</p>
                </a>
                
            </div>

        </div>
    </div>
</x-app-layout>