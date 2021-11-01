<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class Address extends Model
{
    //
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'place', 'number', 'district', 'complement', 'zipcode'
    ];

    public function user()
    {
        return $this->hasMany(User::class);
    }

    public static function createAddress($request)
    {
        $validator = Validator::make($request, [
            'place' => 'required',
            'number' => 'required',
            'district' => 'required',
            'complement' => 'required',
            'zipcode' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors()->toJson(), 400);
        }

        $address = new Address($request);
        $address->save();

        return [
            'success' => 'true',
            'entity'=> $address,
            'msg' => 'created successfully!'
        ];
    }

    public static function updateAddress($request, $id)
    {
        $validator = Validator::make($request, [
            'place' => 'required',
            'number' => 'required',
            'district' => 'required',
            'complement' => 'required',
            'zipcode' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors()->toJson(), 400);
        }

        $address['id'] = $id;
        $address['place'] = $request['place'];
        $address['number'] = $request['number'];
        $address['district'] = $request['district'];
        $address['complement'] = $request['complement'];
        $address['zipcode'] = $request['zipcode'];

        Address::whereId($id)->update($address);

        return [
            'success' => 'true',
            'entity'=> $address,
            'msg' => 'updated successfully!'
        ];

    }
}
