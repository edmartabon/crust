<?php

namespace Crust\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class CreateUser extends FormRequest
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
     * Format the errors from the given Validator instance.
     *
     * @param \Illuminate\Contracts\Validation\Validator $validator
     *
     * @return array
     */
    protected function formatErrors(Validator $validator)
    {
        return $validator->errors()->all();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'username'   => 'required|min:6|unique:users,username',
            'email'      => 'required|email|unique:users,email',
            'password'   => 'required|min:8',
            'first_name' => 'required',
            'last_name'  => 'required',
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
            'username'  => 'Username',
            'email'     => 'Email',
            'password'  => 'Password',
            'firstname' => 'Firstname',
            'lastname'  => 'Lastname',
        ];
    }
}
