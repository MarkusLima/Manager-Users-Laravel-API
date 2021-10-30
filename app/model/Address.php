<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    //
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'phone', 'number', 'district', 'complement', 'zipcode'
    ];

    public function user()
    {
        return $this->hasMany(User::class);
    }
}
