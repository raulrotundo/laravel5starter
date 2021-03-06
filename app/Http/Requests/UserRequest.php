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
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        //PUT refer to the update operation and POST to create
        $user_id       = ($this->method() == 'PUT' ? $this->route()->getParameter('users') : 'NULL');
        $password_rule = ($this->method() == 'PUT' ? 'min:6' : 'required|min:6');

        return [
            'name'       => 'required|max:255',
            'email'      => 'required|max:255|email|unique:users,email,'.$user_id,
            'username'   => 'required|max:255|alpha_dash|unique:users,username,'.$user_id,
            'password'   => $password_rule,
            'country_id' => 'required|not_in:0',
            'avatar'     => 'mimes:jpeg,jpg,png'
        ];
    }
}
