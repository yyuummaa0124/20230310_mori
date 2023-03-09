<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'name' => 'required|string|between:1,191',
            'email' => 'required|email|between:8,191|unique:users,email',
            'password' => 'required|between:1,191|confirmed:password',
            'email' => '',
            'password' => ''
            
        ];
    }
}