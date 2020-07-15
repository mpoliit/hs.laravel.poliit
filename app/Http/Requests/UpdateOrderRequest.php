<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateOrderRequest extends FormRequest
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
            'user_name.required' => 'A name is required',
            'user_name.min' => 'Max length of name should be less than 255 characters',
            'user_surname.required' => 'A surname is required',
            'user_surname.min' => 'Max length of surname should be less than 255 characters',
            'user_email.required' => 'A email is required',
            'user_email.min' => 'Max length of email should be less than 255 characters',
            'user_phone.required' => 'A phone is required',
            'user_phone.max' => 'Phone should be less than 17',
            'country.required' => 'A country is required',
            'country.min' => 'Max length of country should be less than 255 characters',
            'city.required' => 'A city is required',
            'city.min' => 'Max length of city should be less than 255 characters',
            'address.required' => 'A address is required',
            'address.min' => 'Max length of address should be less than 255 characters'


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
            'user_name' => ['required', 'string', 'max:255'],
            'user_surname' => ['required', 'string', 'max:255'],
            'user_email' => ['required', 'string', 'email', 'max:255'],
            'user_phone' => ['required', 'string', 'max:17'],
            'country' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255']
        ];
    }
}
