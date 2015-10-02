<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\Role;
use App\Models\Admin\Permission;

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
     * many-to-many relationship method
     *
     * @return QueryBuilder
     */
    public function roles()
    {
        return $this->belongsToMany('App\Models\Admin\Role', $this->table, 'id');
    }

    public function permissions()
    {
        return $this->belongsToMany('App\Models\Admin\Permission', $this->table, 'id');
    }

    public function listPermissions()
    {
        return ['' => 'Select permission'] + Permission::lists('permission_title', 'id')->toArray();
    }
    public function listRoles()
    {
        return ['' => 'Select role'] + Role::lists('role_title', 'id')->toArray();
    }
}