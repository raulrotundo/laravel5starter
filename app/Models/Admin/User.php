<?php

namespace App\Models\Admin;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract
{
    use Authenticatable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['first_name', 'last_name', 'email', 'password'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    /*
    |--------------------------------------------------------------------------
    | ACL Methods
    |--------------------------------------------------------------------------
    */

    /**
     * Checks a Permission
     *
     * @param  String permission Slug of a permission (i.e: manage_user)
     * @return Boolean true if has permission, otherwise false
     */
    public function can($permission = null)
    {
        return !is_null($permission) && $this->checkPermission($permission);
    }

    /**
     * Check if the permission matches with any permission user has
     *
     * @param  String permission slug of a permission
     * @return Boolean true if permission exists, otherwise false
     */
    protected function checkPermission($perm)
    {
        $havePermission  = $this->roles->first()->permissions->where('permission_slug', $perm);
        $permissions     = $this->getAllPermissionsForAllRoles();        
        $permissionArray = is_array($perm) ? $perm : [$perm];

        return count(array_intersect($permissions, $permissionArray));
    }

    /**
     * Get all permission slugs from all permissions of all roles
     *
     * @return Array of permission slugs
     */
    protected function getAllPermissionsForAllRoles()
    {
        $permissionsArray = [];
        $permissions      = $this->roles->load('permissions')->fetch('permissions')->toArray();
        
        return array_unique(array_flatten(array_map(function ($permission) {
            return array_fetch($permission, 'permission_slug');
        }, $permissions)));
    }

    /*
    |--------------------------------------------------------------------------
    | Relationship Methods
    |--------------------------------------------------------------------------
    */
   
    /**
     * Many-To-Many Relationship Method for accessing the User->roles
     *
     * @return QueryBuilder Object
     */
    public function roles()
    {
        return $this->belongsToMany('App\Models\Admin\Role');
    }

    public function hasRole($name)
    {
        foreach($this->roles as $role)
            if($role->name == $name) return true;
 
        return false;
    }
 
    public function assignRole($role)
    {
        return $this->roles()->attach($role);
    }
 
    public function removeRole($role)
    {
        return $this->roles()->detach($role);
    }

    public function isrole($userrole = null)
    {
        return !is_null($userrole) && $this->checkUserRole($userrole);
    }

    /**
    * Check if User Role match the given role_slug...
    * 
    * @param String role slug of a role
    * @return Boolean true if role exists, otherwise false
    */
    protected function checkUserRole($givenrole){
        $getrole= $this->roles->toArray();
        foreach ($getrole as $key){
            if(array_key_exists('role_slug',$key) && $key['role_slug'] == $givenrole){
                return true;
            }
        }
        return false;
    }
}
