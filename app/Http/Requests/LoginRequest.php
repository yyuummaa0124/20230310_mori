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
            'email' => 'required|email|between:8,191|unique:users,email',
            'password' => 'required|between:1,191|confirmed:password',
            
        ];
    }

        public function messages()
    {
        return [
            'email.required' => 'メールアドレスを入力してください。',
            'email.between:8,191' => '191文字以下で入力してください。',
            'email.email' => 'メールアドレスの形式で入力してください。',
            'password.required' => 'パスワードを入力してください',
            'password.between:8,191' => 'パスワードは8文字以上で入力してください。',
            'password.confirmed:password' => 'パスワードが一致しません。',
        ];
    }
}