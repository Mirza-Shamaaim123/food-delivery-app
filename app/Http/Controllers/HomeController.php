<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;  

class HomeController extends Controller
{
    //
    public function index()
{
    $categories = Category::all();
    // latest 4 products
     $featuredProducts = Product::where('is_featured_on_homepage', 'Yes')->limit(4)->get();
    return view('frontend.index', compact('categories', 'featuredProducts'));
}
public function about(){
    return view('frontend.about');
}
public function contact(){
    return view('frontend.contact');
}

}
