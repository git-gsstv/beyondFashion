<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SupplierUpdateRequest extends FormRequest
{
    // ... authorize() ...

    public function rules(): array
    {
        $supplierId = $this->route('supplier')->id; 

        return [
            'nome' => [
                'required', 
                'string', 
                'max:255', 
                Rule::unique('suppliers', 'nome')->ignore($supplierId), 
            ],
            'cnpj' => [
                'required',
                'string',
                'max:18',
                Rule::unique('suppliers', 'cnpj')->ignore($supplierId),
            ],
            'email' => [
                'required', 
                'email', 
                Rule::unique('suppliers', 'email')->ignore($supplierId),
            ],
            
            'telefone' => ['required', 'string', 'max:20'],
            'endereco' => ['required', 'string'],
        ];
    }

    public function attributes(): array
    {
        return [
            'nome' => 'Nome da Empresa',
            'cnpj' => 'CNPJ',
            'email' => 'E-mail',
            'telefone' => 'Telefone',
            'endereco' => 'Endereço',
        ];
    }

    public function messages(): array
    {
        return [
            'nome.required'   => 'O Nome da Empresa é obrigatório.',
            'cnpj.required'   => 'O campo CNPJ é obrigatório.',
            'email.required'  => 'O E-mail é obrigatório.',

            'telefone.required' => 'O Telefone é obrigatório.',
            'endereco.required' => 'O campo Endereço é obrigatório.',

            'nome.unique'     => 'Já existe um fornecedor com este nome.',
            'cnpj.unique'     => 'Este CNPJ já está cadastrado.',
            'email.unique'    => 'Este E-mail já está cadastrado.',
        ];
    }
}