<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
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


 public function category(){
        return $this->hasMany(Product::class);
    }

}

