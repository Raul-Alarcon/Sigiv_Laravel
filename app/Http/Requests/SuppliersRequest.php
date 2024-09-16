<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SuppliersRequest extends FormRequest
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
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:100',
            'description' => 'required|string|max:255',
            'contact' => 'required|string|max:100',
            'phone' => 'required|string|max:20|regex:/^[0-9]+$/', // Validación para números de teléfono
            'email' => 'required|email|max:100',
            'status' => 'nullable|boolean',
        ];
    }
}
