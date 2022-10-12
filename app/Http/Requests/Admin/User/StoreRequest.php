<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'This field is required',
            'name.string' => 'Name must be a string',
            'email.required' => 'This field is required',
            'email.string' => 'Mail must be a string',
            'email.email' => 'Your mail must match the format mail@some.domain',
            'email.unique' => 'User with this email already exists',
            'password.required' => 'This field is required',
            'password.string' => 'Password must be a string',
        ];
    }
}
