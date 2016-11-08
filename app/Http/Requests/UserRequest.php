<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UserRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
                'name' => 'required|min:5',
                'email' => 'required|email|unique:users',
                'password' => 'required|between:5,20',
                'password_confirmation' => 'required|same:password'            
        ];
    }
}
