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
        $user_id = $this->route()->getParameter('users');

        //PUT refer to the update operation and POST to create
        $password_rule = ($this->method() == 'PUT' ? '' : 'required|min:6');

        return [
            'name'       => 'required|max:255',
            'email'      => 'required|max:255|email|unique:users,id,'.$user_id,
            'password'   => $password_rule,
            'country_id' => 'required',
        ];
    }
}
