<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    //
     protected $fillable = [
        'code',
        'discount',
        'discount_type',
        'expires_at',

        'description',
    ];
}
