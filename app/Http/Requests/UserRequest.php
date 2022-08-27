<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            "name" => 'required|min:2',
            "country" => 'required|string',
            "city" => 'required|string',
            'email' => 'email|unique:users,email,'.$this -> id,
            'phone' => 'required|min:11|max:11|unique:users,phone,'.$this -> id,
            'password'  => 'required|min:8'
        ];
    }
}
