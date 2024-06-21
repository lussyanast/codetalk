<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // Implement your authorization logic if needed
        // For example, you can check if the user is authenticated:
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
            'username' => [
                'required', 
                'alpha_dash',
                'min:3', 
                'max:50',
                Rule::unique('users')->ignore(request()->username, 'username')
            ],
            'password' => [
                'nullable', 
                'confirmed',
                Password::min(8)->mixedCase()->numbers()->symbols()
            ],
            'password_confirmation' => ['nullable'],
            'picture' => ['nullable', 'image', 'max:30000'],
        ];
    }
}
