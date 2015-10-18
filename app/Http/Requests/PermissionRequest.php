<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class PermissionRequest extends Request
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
        $permission_id = ($this->method() == 'PUT' ? $this->route()->getParameter('permissions') : 'NULL');

        return [
            'permission_title' => 'required',
            'permission_slug' => 'required|unique:permissions,permission_slug,'.$permission_id,
            'permission_description' => 'required'
        ];
    }
}
