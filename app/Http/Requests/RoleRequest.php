<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class RoleRequest extends Request
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
        $role_id = ($this->method() == 'PUT' ? $this->route()->getParameter('roles') : 'NULL');

        return [
            'role_title' => 'required',
            'role_slug' => 'required|unique:roles,role_slug,'.$role_id,
            'description' => 'required'
        ];
    }
}
