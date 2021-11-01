<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

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

    public static function createPermission($request)
    {
        $validator = Validator::make($request, [
            'permission_name' => 'required',
            'permission_url' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors()->toJson(), 400);
        }

        $permission = new Permission($request);
        $permission->save();

        return [
            'success' => 'true',
            'entity'=> $permission,
            'msg' => 'created successfully!'
        ];
    }

    public static function updatePermission($request, $id)
    {
        $validator = Validator::make($request, [
            'permission_name' => 'required',
            'permission_url' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors()->toJson(), 400);
        }

        $permission['id'] = $id;
        $permission['permission_name'] = $request['permission_name'];
        $permission['permission_url'] = $request['permission_url'];

        Permission::whereId($id)->update($permission);

        return [
            'success' => 'true',
            'entity'=> $permission,
            'msg' => 'updated successfully!'
        ];

    }
}
