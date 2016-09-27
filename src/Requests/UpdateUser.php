<?php

namespace Crust\Requests;

use Cactus;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;

class UpdateUser extends FormRequest
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
     * @param  \Illuminate\Contracts\Validation\Validator  $validator
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
            'username'   => 'required|min:6|unique:users,username,' . $this->id,
            'email'      => 'required|email|unique:users,email,' . $this->id,
            'first_name' => 'required',
            'last_name'  => 'required'
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
            'firstname' => 'Firstname',
            'lastname'  => 'Lastname'
        ];
    }
}