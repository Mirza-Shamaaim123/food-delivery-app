<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
     protected $fillable = [
        'user_id',
        'product_name',
        'total_amount',
        'billing_first_name',
        'billing_last_name',
        'billing_company_name',
        'billing_street_address',
        'billing_apartment_suite_unit',
        'billing_city',
        'billing_country',
        'billing_postcode_zip',
        'billing_email_address',
        'billing_phone_number',

        'shipping_first_name',
        'shipping_last_name',
        'shipping_company_name',
        'shipping_street_address',
        'shipping_apartment_suite_unit',
        'shipping_city',
        'shipping_country',
        'shipping_postcode_zip',
        'shipping_email_address',
        'shipping_phone_number',

        'payment_method',
        'status',
    ];

}
