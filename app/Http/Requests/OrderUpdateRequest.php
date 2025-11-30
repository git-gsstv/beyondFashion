<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class OrderUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; 
    }

    public function rules(): array
    {
        return (new OrderStoreRequest())->rules();
    }
    
    public function attributes(): array
    {
        return (new OrderStoreRequest())->attributes();
    }

    public function messages(): array
    {
        return (new OrderStoreRequest())->messages();
    }
}