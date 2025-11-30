<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EmployeeUpdateRequest extends FormRequest
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
        $employeeId = $this->route('employee')->id; 

        return [
            'nome' => [
                'required', 
                'string', 
                'max:255', 
                Rule::unique('employees', 'nome')->ignore($employeeId), 
            ],
            'cargo' => ['required', 'string', 'max:100'],
            'turno' => ['required', 'string', 'max:50'],
        ];
    }

    public function attributes(): array
    {
        return [
            'nome' => 'Nome do Funcionário',
            'cargo' => 'Cargo',
            'turno' => 'Turno',
        ];
    }

    public function messages(): array
    {
        return [
            'nome.required'   => 'O Nome do Funcionário é obrigatório.',
            'nome.unique'     => 'Já existe um funcionário com este nome.',
            'cargo.required'  => 'O Cargo é obrigatório.',
            'turno.required'  => 'O Turno é obrigatório.',
        ];
    }
}