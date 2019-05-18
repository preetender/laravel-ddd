<?php

namespace App\Domain\Auth\Http\Validations;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|min:4',
            'email' => 'required|email|unique:users',
            'avatar' => 'nullable|image|between:1,5000',
            'password' => 'required|digits_between:6,8|confirmed'
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'name' => 'nome',
            'password' => 'senha',
            'password_confirmation' => 'repetir-senha',
        ];
    }
}
