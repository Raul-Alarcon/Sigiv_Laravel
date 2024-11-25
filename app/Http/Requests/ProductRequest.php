<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'name' => 'required|string|max:100',
            'description' => 'nullable|string',
            'unit_price' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
            'barcode' => 'nullable|string|max:50',
            'productstatus_id' => 'required|exists:productstatuses,id',
            'supplier_id' => 'required|exists:suppliers,id',
        ];
    }
}
