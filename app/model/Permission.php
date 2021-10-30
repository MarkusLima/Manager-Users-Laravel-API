<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    //
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'permission_name', 'permission_url',
    ];

    public function permissionUser()
    {
        return $this->hasMany(PermissionUser::class);
    }
}
