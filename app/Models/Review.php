<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Review extends Model
{
    //
      use HasFactory;

    // ✅ Fillable fields (Mass assignment ke liye)
    protected $fillable = [
        'product_id',
        'name',
        'email',
        'comment',
        'rating',
        'status',
    ];
    public function product()
{
    return $this->belongsTo(Product::class);
}
}