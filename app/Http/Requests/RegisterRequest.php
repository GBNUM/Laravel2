<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class RegisterRequest extends FormRequest
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
            'Firstname' => 'required|string|max:255',
            'Lastname' => 'required|unique:users|',
            'Username' => 'required|string|unique:users|',
            'Email' => 'required|email|unique:users|',
            'Password' => 'required|string',
            Password::min(8)->letters(),

        ];
    }
}
