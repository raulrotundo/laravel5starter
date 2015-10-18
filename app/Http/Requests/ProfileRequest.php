<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ProfileRequest extends Request
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

    public function attributes(){
        return [
            'name'       => trans('admin/profile.attrs.name'),
            'email'      => trans('admin/profile.attrs.email'),
            'country_id' => trans('admin/profile.attrs.country_id'),
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $user_id = $this->route()->getParameter('user');

        return [
            'name'       => 'required|max:255',
            'email'      => 'required|max:255|email|unique:users,id,'.$user_id,
            'country_id' => 'required|not_in:0',
        ];
    }
}
