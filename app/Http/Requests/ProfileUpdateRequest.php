<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['string', 'max:255'],
            'email' => ['email', 'max:255', Rule::unique(User::class)->ignore($this->user()->id)],
            'phone' => ['nullable', 'string', 'max:20'],
        ];
    }

    /**
     * Get custom messages for validator errors.
     */
    public function messages(): array
    {
        return [
            'name.string' => 'O nome deve ser uma string.',
            'name.max' => 'O nome deve ter no máximo 255 caracteres.',
            'email.email' => 'O email deve ser um endereço de email válido.',
            'email.max' => 'O email deve ter no máximo 255 caracteres.',
            'email.unique' => 'Este email já está sendo usado por outra conta.',
            'phone.string' => 'O telefone deve ser uma string.',
            'phone.max' => 'O telefone deve ter no máximo 20 caracteres.',
        ];
    }
}
