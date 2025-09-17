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
        
    ];
    protected $casts = [
        'tag_ids' => 'array', // JSON column ko array me convert karega
    ];
    public function product()
    {
        return $this->belongsTo(Category::class);
    }
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
