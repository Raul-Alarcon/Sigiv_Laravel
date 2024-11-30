<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'first_names' => 'required|string|max:20',
            'last_names' => 'nullable|string|max:20',    
            'dui' => 'required|string|max:11',
            'birth_date' => 'required|date',
            'gender_id' => 'required|integer',
            'phone' => 'required|string|max:9',
            'email' => 'required|email',
            'direcction' => 'required|string|max:100'
        ];
    }
}
