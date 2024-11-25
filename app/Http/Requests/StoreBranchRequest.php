<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBranchRequest extends FormRequest
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
            'logo' => 'nullable|string|max:200',
            'name' => 'required|string|max:200',
            'NIT' => 'nullable|string|max:20',
            'description' => 'required|string',
            'opening_date' => 'required|date',
        ];
    }
}
