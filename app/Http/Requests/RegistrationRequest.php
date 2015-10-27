<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class RegistrationRequest extends Request
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
            'name'                 => 'required|max:255',
            'email'                => 'required|email|max:255|unique:users,email',
            'username'             => 'required|max:255|alpha_dash|unique:users,username',
            'password'             => 'required|confirmed|min:6',
            'country_id'           => 'required|not_in:0',
            'agree'                => 'required',
            'g-recaptcha-response' => 'required|captcha'
        ];
    }
}
