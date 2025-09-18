<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Storage;

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
     protected static function boot()
    {
        parent::boot();

        static::deleting(function ($product) {
            if ($product->image && Storage::disk('public')->exists($product->image)) {
                Storage::disk('public')->delete($product->image);
            }
        });
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
