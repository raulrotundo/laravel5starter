<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\Permission;
use App\Models\Admin\Role;

class PermissionRole extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'permission_role';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['permission_id','role_id'];

    /**
    * Timestamps fields settings, use true if you need updated_at and create_at
    * @var string
    */
    public $timestamps = false;

    /*
    |--------------------------------------------------------------------------
    | Relationship Methods
    |--------------------------------------------------------------------------
    */

    /**
     * hasMany relationship method.
     *
     * @return QueryBuilder
     */
    public function roles()
    {
        return $this->hasMany('App\Models\Admin\role', 'id');
    }

    public function listRoles()
    {
        return ['' => 'Select role'] + Role::lists('role_title', 'id')->toArray();
    }

    /**
     * hasMany relationship method.
     *
     * @return QueryBuilder
     */
    public function permissions()
    {
        return $this->hasMany('App\Models\Admin\Permission', 'id');
    }

    public function listPermissions()
    {
        return ['' => 'Select permission'] + Permission::lists('permission_title', 'id')->toArray();
    }

}