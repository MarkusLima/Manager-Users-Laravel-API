<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class PermissionUser extends Model
{
    //
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'permission_id',
    ];

    public function permission()
    {
        return $this->belongsTo(Permission::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function createPermissionUser($request, $user_id)
    {
        $validator = Validator::make($request, [
            'permission_id' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors()->toJson(), 400);
        }

        if($permissionUser = PermissionUser::where('user_id', $user_id)->where('permission_id', $request['permission_id'])->first()){
            return [
                'success' => 'false',
                'entity' => $permissionUser,
                'msg' => 'permission alread exist!'
            ];
        }

        $permissionUser = PermissionUser::create([
            'user_id' => $user_id,
            'permission_id' => $request['permission_id']
        ]);

        return [
            'success' => 'true',
            'entity' => $permissionUser,
            'msg' => 'action successfully!'
        ];
    }
}
