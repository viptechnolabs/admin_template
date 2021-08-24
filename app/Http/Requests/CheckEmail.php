<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CheckEmail extends FormRequest
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
            'email' => 'email|unique:users,email',
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'Enter Email in Proper Format.',
            'email.unique' => 'Email is Already Registered Enter Different Email.',
        ];
    }
}
