<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
            'order_number' => 'required|string|max:20',
            'order_date' => 'required|date',
            'status' => 'required|string|max:20',
            'total' => 'required|numeric',
            'customer_id' => 'required|integer|exists:customers,id',
            'order_status_id' => 'required|integer|exists:order_statuses,id',
        ];
    }
}
