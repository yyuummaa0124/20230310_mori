<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TodoRequest extends FormRequest
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
            'content' => 'required|between:1,20',
            'tag' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'content.required' => 'タスクを入力してください。',
            'content.between' => 'タスクは20文字以下で入力してください。',
            'tag.required' => 'タグを入力してください。',
        ];
    }
}
