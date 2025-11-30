<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class OrderStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; 
    }

    public function rules(): array
    {
        return [
            'cliente_nome' => ['required', 'string', 'max:255'],
            'total' => ['required', 'numeric', 'min:0.01'],

            'vendedor_id' => ['required', 'integer', 'exists:employees,id'], 

            'status' => ['required', 'string', Rule::in(['Pendente', 'Em Processamento', 'Enviado', 'Entregue', 'Cancelado'])],
            'forma_pagamento' => ['required', 'string', Rule::in(['Crédito', 'Débito', 'Pix', 'Dinheiro', 'Boleto'])],
        ];
    }
    
    public function attributes(): array
    {
        return [
            'cliente_nome' => 'Nome do Cliente',
            'vendedor_id' => 'Vendedor',
            'status' => 'Status',
            'forma_pagamento' => 'Forma de Pagamento',
            'total' => 'Valor Total',
        ];
    }

    public function messages(): array
    {
        return [
            'cliente_nome.required' => 'O Nome do Cliente é obrigatório.',
            'total.required' => 'O Valor Total é obrigatório.',
            'total.numeric' => 'O Valor Total deve ser um número.',
            'total.min' => 'O Valor Total deve ser maior que zero.',

            'vendedor_id.required' => 'Selecione um Vendedor (Funcionário).',
            'vendedor_id.exists' => 'O Vendedor selecionado é inválido.',

            'status.required' => 'O Status do Pedido é obrigatório.',
            'status.in' => 'O Status selecionado é inválido.',

            'forma_pagamento.required' => 'A Forma de Pagamento é obrigatória.',
            'forma_pagamento.in' => 'A Forma de Pagamento selecionada é inválida.',
        ];
    }
}