<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SupplierStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; 
    }

    public function rules(): array
    {
        return [
            'nome' => [
                'required', 
                'string', 
                'max:255', 
                'unique:suppliers,nome' 
            ],
            'cnpj' => [
                'required',
                'string',
                'max:18', 
                'unique:suppliers,cnpj'
            ],
            'email' => ['required', 'email', 'unique:suppliers,email'],
            
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