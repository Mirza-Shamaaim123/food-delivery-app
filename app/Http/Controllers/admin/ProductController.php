<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    public function index(){
        $products = Product::all();
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.product-list', compact('products', 'categories', 'tags'));
    }
    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'category_id' => 'required|exists:categories,id',
            'tag_id' => 'nullable|exists:tags,id',
            
        ]);
        if($validator->passes()){
            $product = new Product();
            $product->name = $request->name;
            $product->price = $request->price;
            $product->description = $request->description;
            $product->category_id = $request->category_id;
            $product->tag_id = $request->tag_id;  // ✅ Store tag_id
            if ($request->hasFile('image')) {
                $path = $request->file('image')->store('images/products', 'public');
                $product->image = $path; 
            }
            $product->save();
            return redirect()->route('admin.productlist')
            ->with('success', 'Product added successfully.');

        }

    }
    
}
