<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Tag;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    //
    public function index(){
        $categories = Category::all();
        return view('frontend.index', compact('categories'));
    }
    public function shop(){
        $products = Product::all();
        return view('frontend.shop', compact('products'));
    }
    public function details($id){
       $product = Product::findOrFail($id);
       $tags= Tag::all();
       
    

        return view('frontend.shop-details', compact('product', 'tags'));
    }

}
