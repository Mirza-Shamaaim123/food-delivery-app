<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ShippingDetail extends Model
{
    //
     use HasFactory;

    protected $fillable = [
        'order_id',
        'first_name',
        'last_name',
        'company_name',
        'street_address',
        'apartment_suite_unit',
        'city',
        'country',
        'postcode_zip',
        'email_address',
        'phone_number',
    ];

    // Agar ek order ke saath link karna ho
    // public function order()
    // {
    //     return $this->belongsTo(Order::class);
    // }
}
