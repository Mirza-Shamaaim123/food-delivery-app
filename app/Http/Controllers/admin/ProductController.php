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
    public function index()
    {
        $products = Product::all();
        $categories = Category::all();
        $tags = Tag::all();
        // dd($tags);
        return view('admin.product-list', compact('products', 'categories', 'tags'));
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'category_id' => 'required|exists:categories,id',
            'tags' => 'required|array',       // use "tags" instead of "tag_id"
            'tags.*' => 'exists:tags,id',
        ]);
        if ($validator->passes()) {
            $product = new Product();
            $product->name = $request->name;
            $product->price = $request->price;
            $product->description = $request->description;
            $product->category_id = $request->category_id;
    
            if ($request->hasFile('image')) {
                $path = $request->file('image')->store('images/products', 'public');
                $product->image = $path;
            }
            $product->tag_ids = $request->tags; // ✅ Store tag_ids as JSON
            $product->save();
            
            // $product->tags()->sync($request->tags);
            return redirect()->route('admin.productlist')
                ->with('success', 'Product added successfully.');
        }
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'category_id' => 'required|exists:categories,id',
            'tag_id' => 'nullable|exists:tags,id',
            'status' => 'required|in:active,inactive',
        ]);
        $product = Product::findOrFail($id);
        $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->category_id = $request->category_id;
        $product->tag_id = $request->tag_id;  // ✅ Store tag_id
        $product->status = $request->status;
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('images/products', 'public');
            $product->image = $path;
        }
        $product->save();
        return redirect()->route('admin.productlist')
            ->with('success', 'Product updated successfully.');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->route('admin.productlist')
            ->with('success', 'Product deleted successfully.');
    }
}
