<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BillingDetail extends Model
{
    //
    protected $fillable = [
        'country',
        'first_name',
        'last_name',
        'company_name',
        'street_address',
        'apartment_suite_unit',
        'city',
        'postcode_zip',
        'email_address',
        'phone_number',
    ];
}
