<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
{
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'first_name' => 'required|string|max:20',
            'second_name' => 'nullable|string|max:20',
            'third_name' => 'nullable|string|max:20',
            'first_surname' => 'required|string|max:20',
            'second_surname' => 'nullable|string|max:20',
            'third_surname' => 'nullable|string|max:20',
            'dui' => 'required|string|max:11',
            'birth' => 'required|date',
            'gender_id' => 'required|integer',
        ];
    }
}
