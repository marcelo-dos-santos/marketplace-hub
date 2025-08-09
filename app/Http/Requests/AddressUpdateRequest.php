<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddressUpdateRequest extends FormRequest
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
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:100',
            'state' => 'nullable|string|size:2',
            'zip_code' => 'nullable|string|max:10',
            'country' => 'nullable|string|max:100',
        ];
    }

    /**
     * Get custom messages for validator errors.
     */
    public function messages(): array
    {
        return [
            'phone.max' => 'O telefone deve ter no máximo 20 caracteres.',
            'address.max' => 'O endereço deve ter no máximo 255 caracteres.',
            'city.max' => 'A cidade deve ter no máximo 100 caracteres.',
            'state.size' => 'O estado deve ter exatamente 2 caracteres.',
            'zip_code.max' => 'O CEP deve ter no máximo 10 caracteres.',
            'country.max' => 'O país deve ter no máximo 100 caracteres.',
        ];
    }
}
