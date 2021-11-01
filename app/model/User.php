<?php

namespace App\model;

use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'email_verified_at'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function permissionUser()
    {
        return $this->hasMany(PermissionUser::class);
    }

    public function address()
    {
        return $this->belongsTo(Address::class);
    }

    // Rest omitted for brevity

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }

    public static function updateUser($request, $id)
    {

        $validator = Validator::make($request, [
            'name' => 'required',
            'email' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors()->toJson(), 400);
        }

        $user['id'] = $id;
        $user['name'] = $request['name'];
        $user['email'] = $request['email'];
        if(!empty($request['password'])){
            $user['password'] = $request['password'];
        }

        User::whereId($id)->update($user);

        return [
            'success' => 'true',
            'entity'=> $user,
            'msg' => 'updated successfully!'
        ];

    }

    public static function createUserAddress($request, $user_id)
    {
        $validator = Validator::make($request, [
            'address_id' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors()->toJson(), 400);
        }

        $user['id'] = $user_id;
        $user['address_id'] = $request['address_id'];

        User::whereId($user_id)->update($user);

        return [
            'success' => 'true',
            'entity'=> $user,
            'msg' => 'updated successfully!'
        ];
    }
}
