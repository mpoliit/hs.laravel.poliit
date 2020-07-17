<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserAccountRequest extends FormRequest
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

    public function messages()
    {
        return [

            'name.required' => 'Product name is required',
            'name.min' => 'Max length of name should be less than 55 characters',
            'surname.required' => 'Product name is required',
            'surname.min' => 'Max length of name should be less than 55 characters',
            'email.required' => 'Email is required',
            'email.unique' => 'User email should be unique',
            'phone.required' => 'Phone is required',
            'phone.unique' => 'User phone should be unique',
            'balance.required' => 'Phone is required',

        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:55'],
            'surname' => ['required', 'string', 'max:55'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'phone' => ['required', 'string', 'max:17'],
            'balance' => ['required']

        ];
    }
}
