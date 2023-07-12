<?php

namespace App\Http\Requests;
use App\Models\User;

use Illuminate\Validation\Rules;
use Illuminate\Foundation\Http\FormRequest;

class AdminRegister extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'role' => ['required', 'integer'],
            'association_id' => ['required', 'string', 'min:4', 'max:6', 'unique:' . User::class],
            'username' => ['required', 'string', 'min:6', 'max:12', 'unique:' . User::class],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ];
    }
}
