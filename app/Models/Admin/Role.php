<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\Permission;

class Role extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'roles';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['role_title','role_slug','description'];

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
     * many-to-many relationship method.
     *
     * @return QueryBuilder
     */
    public function users()
    {
        return $this->belongsToMany('App\Models\Admin\User');
    }

    public function permissions()
    {
        return $this->belongsToMany('App\Models\Admin\Permission');
    }

    public function listPermissions()
    {
        return Permission::lists('permission_title', 'id')->toArray();
    }

    public function listPermissionsAssigned()
    {
        return $this->permissions->lists('permission_title', 'id');
    }
}