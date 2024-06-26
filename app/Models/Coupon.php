<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    protected $fillable = ['code', 'discount', 'is_percentage', 'valid_until'];

    // Inside Coupon model

public function users()
{
        return $this->belongsToMany(User::class,'coupon_users')->withTimestamps();
}


}


