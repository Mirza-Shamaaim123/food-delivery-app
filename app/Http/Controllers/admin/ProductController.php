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
            'sku' => 'required|string|unique:products,sku', // ✅ SKU must be unique
            'price' => 'required|numeric',
            'sale_price' => 'nullable|numeric|lt:price', // ✅ Sale price must be less than regular price
            'in_stock' => 'required|boolean', // ✅ Stock availability
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'category_id' => 'required|exists:categories,id',
            'tags' => 'required|array',       // use "tags" instead of "tag_id"
            'tags.*' => 'exists:tags,id',
        ]);
        if ($validator->passes()) {
            $product = new Product();
            $product->name = $request->name;
            $product->sku = $request->sku;
            $product->price = $request->price;
            $product->sale_price = $request->sale_price; // ✅ Add sale price
            $product->in_stock = $request->in_stock; // ✅ Add stock availability
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
            'status' => 'required|in:active,inactive',
            'tags' => 'nullable|array', // multiple tags
            'tags.*' => 'exists:tags,id', // har tag_id tags table me hona chahiye
        ]);
        $product = Product::findOrFail($id);
        $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->category_id = $request->category_id;
        $product->status = $request->status;
        $product->tag_id = json_encode($request->tags);
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
