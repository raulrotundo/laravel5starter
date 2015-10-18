<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ProfileSecurityRequest extends Request
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
        $req = (request::input('chg_password.current') != '') ? 'required|' : '';

        return [
            'chg_password.current' => $req.'min:6',
            'chg_password.new'     => $req.'min:6|different:chg_password.current|same:chg_password.repeat',
            'chg_password.repeat'  => $req.'min:6',
        ];
    }
}
