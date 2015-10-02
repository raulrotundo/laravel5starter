<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class PermissionRoleRequest extends Request
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
        $permissionrole_id = $this->route()->getParameter('permissionroles');
        return [
            'permission_id' => 'required|exists:permissions,id|unique:permission_role,permission_id,' . $permissionrole_id . ',id,role_id,' . request::input('role_id'),
            'role_id' => 'required|exists:roles,id',
        ];
    }
}
