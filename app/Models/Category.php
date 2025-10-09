<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

   

    protected $fillable = [
        'name',
        'slug',
        'description',
        'image',
        'status',
        'available_items'
    ];
     protected $table = 'categories';

    //  protected static function boot()
    // {
    //     parent::boot();

    //     static::deleting(function ($category) {
    //         if ($category->image && Storage::disk('public')->exists($category->image)) {
    //             Storage::disk('public')->delete($category->image);
    //         }
    //     });
    // }



 public function category(){
        return $this->hasMany(Product::class);
    }

//     public function getUsageCount()
// {
//     return $this->products()->count();  // 'products' is the relationship method
// }
public function products()
{
    return $this->hasMany(Product::class, 'category_id', 'id');
}
  public function blogs()
    {
        return $this->hasMany(Blog::class, 'category','name');
    }

}

