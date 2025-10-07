<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    public function index()
    {
        $products = Product::paginate(5);
        // $featuredProducts = Product::where('is_featured_on_homepage', 'Yes')->limit(4)->get();
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
            // 'in_stock' => 'required|boolean', // ✅ Stock availability
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'category_id' => 'required|exists:categories,id',
            'tags' => 'required|array',       // use "tags" instead of "tag_id"
            'tags.*' => 'exists:tags,id',
            'sale_status' => 'required|string|in:Yes,No',  // ✅ Validation for sale_status
            'is_featured_on_homepage' => 'required|string|in:Yes,No', // ✅ Validation for featured status
        ]);
        if ($validator->passes()) {
            $product = new Product();
            $product->name = $request->name;
            $product->sku = $request->sku;
            $product->price = $request->price;
            $product->sale_price = $request->sale_price; // ✅ Add sale price
            // $product->in_stock = $request->in_stock; // ✅ Add stock availability
            $product->description = $request->description;
            $product->category_id = $request->category_id;
            $product->sale_status = $request->sale_status; // ✅ Save sale status
            $product->is_featured_on_homepage = $request->is_featured_on_homepage; // ✅ Save featured status

            if ($request->hasFile('image')) {
                $path = $request->file('image')->store('images/products', 'public');
                $product->image = $path;
            }
            // $product->tag_ids = json_encode($request->tags);
            $product->tag_ids = $request->tags;
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
            'sku' => 'required|string|unique:products,sku,' . $id, // ✅ same product allow
            'price' => 'required|numeric',
            'sale_price' => 'nullable|numeric|lt:price', // ✅ sale price less than price
            // 'in_stock' => 'required|boolean', // ✅ 1 = in stock, 0 = out of stock
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'category_id' => 'required|exists:categories,id',
            'status' => 'required|in:active,inactive',
            'tags' => 'nullable|array',
            'tags.*' => 'exists:tags,id',
            'sale_status' => 'required|in:Yes,No',  // ✅ Validation for sale_status as "Yes" or "No"
            'is_featured_on_homepage' => 'required|string|in:Yes,No', // ✅ Validation for featured status
        ]);

        $product = Product::findOrFail($id);

        $product->name = $request->name;
        $product->sku = $request->sku;
        $product->price = $request->price;
        $product->sale_price = $request->sale_price;
        // $product->in_stock = $request->in_stock;
        $product->description = $request->description;
        $product->category_id = $request->category_id;
        $product->status = $request->status;
        $product->sale_status = $request->sale_status; // ✅ Adding sale_status
        $product->is_featured_on_homepage = $request->is_featured_on_homepage; // ✅ Saving is_featured_on_homepage
        $product->tag_ids = json_encode($request->tags);

        // ✅ image update logic
        if ($request->hasFile('image')) {
            // purani image delete karna
            if ($product->image && Storage::disk('public')->exists($product->image)) {
                Storage::disk('public')->delete($product->image);
            }

            // nayi image upload karna
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
