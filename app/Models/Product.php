<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    //
        use HasFactory;

      

    protected $fillable = [
        'name',
        'price',
        'description',
        'image',
        'availability',
        'status',
        'category_id',
        'tag_id',
    ];
     public function product()
        {
            return $this->belongsTo(Category::class);
        }
        public function tag()
{
    return $this->belongsTo(Tag::class, 'tag_id');
}


}
