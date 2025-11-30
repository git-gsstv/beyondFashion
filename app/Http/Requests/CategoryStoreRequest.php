<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; 
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'nome' => [
                'required', 
                'string', 
                'max:255', 
                'unique:categories,nome' 
            ],
            'description' => ['nullable', 'string'],
        ];
    }

    public function attributes(): array
    {
        return [
            'nome' => 'Nome',
            'description' => 'Descrição',
        ];
    }

    public function messages(): array
    {
        return [
            'nome.required' => 'O campo Nome da Categoria é obrigatório.',
            'nome.unique'   => 'Já existe uma categoria com este nome.',
            'nome.max'      => 'O Nome da Categoria não pode ter mais de 255 caracteres.',
        ];
    }
}