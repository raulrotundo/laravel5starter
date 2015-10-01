<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class SocialData extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users_social';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id','provider','social_data'];


    /**
    * Timestamps fields settings, use true if you need updated_at and create_at
    * @var string
    */
    public $timestamps = true;

}