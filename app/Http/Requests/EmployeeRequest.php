<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
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
            'code' => 'required|string|max:20',
            'DUI' => 'required|string|max:10',
            'names' => 'required|string|max:200',
            'last_names' => 'required|string|max:200',
            'age' => 'required|integer',
            'hiring_date' => 'required|date',
            'termination_date' => 'nullable|date',
            'storebranch_id' => 'required|integer',
            'charge_id' => 'required|integer',
        ];
    }
}
