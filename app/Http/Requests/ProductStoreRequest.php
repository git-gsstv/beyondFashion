<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation()
    {
        if (!$this->has('supplier_id')) {
            $this->merge([
                'supplier_id' => null,
            ]);
        }
        
        if (!$this->has('categories')) {
            $this->merge([
                'categories' => [],
            ]);
        }
    }

    public function rules(): array
    {
        return [
            'name'          => ['required', 'string', 'max:255', 'unique:products,name'],
            'description'   => ['nullable', 'string'],
            'price'         => ['required', 'numeric', 'min:0.01'],
            'stock'         => ['required', 'integer', 'min:0'],
        
            'categories'    => ['required', 'array', 'min:1'],
            'categories.*'  => ['exists:categories,id'], 
            
            'supplier_id'   => ['required', 'exists:suppliers,id'],
        ];
    }
    
    public function messages(): array
    {
        return [
            'name.required'       => 'O campo Nome é obrigatório.',
            'stock.required'      => 'O campo Estoque é obrigatório.',
            'categories.required' => 'Selecione pelo menos uma categoria.',
            'categories.min'      => 'Selecione pelo menos uma categoria.',
            'categories.*.exists' => 'Uma das categorias selecionadas é inválida.',
            'supplier_id.required' => 'O fornecedor é obrigatório.',
            'supplier_id.exists'   => 'O fornecedor selecionado é inválido.',
            'name.unique'         => 'Já existe outro produto com este nome.',
            'price.required'      => 'O campo Preço é obrigatório.',
        ];
    }

    public function attributes(): array
    {
        return [
            'name'          => 'Nome',
            'size'          => 'Tamanho',
            'color'         => 'Cor',
            'stock'         => 'Estoque',
            'price'         => 'Preço',
            'description'   => 'Descrição',
            'categories'    => 'Categorias',
            'supplier_id'   => 'Fornecedor',
        ];
    }
}