<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    //
    public function index(){
        $category = Category::orderBy('id', 'desc')->get();

        return view('admin.category-list', compact('category'));
    }
    public function add(){
        return view('admin.category-add');
    }
   public function store(Request $request)
{
    $validator = Validator::make($request->all(), [
        'name' => 'required|string|max:255',
        // 'slug' => 'required|string|unique:categories,slug',
        'description' => 'nullable|string',
        'available_items' => 'required|integer|min:0', // ✅ Add available_items validation
        'status' => 'required|in:active,inactive', // ✅ Correct
        'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
    ]);

    if ($validator->passes()) {
        $category = new Category();
        $category->name = $request->name;
        // $category->slug = $request->slug;
        $category->description = $request->description;
         $category->available_items = $request->available_items; // ✅ Save available_items
        $category->status = $request->status; // 👈 yahan "active" / "inactive" save hoga

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
//               // Save inside storage/app/public/images/category
//     $image->storeAs('public/images/category', $imageName);
//              // Save relative path in DB
//    $category->image = 'storage/images/category/' . $imageName;


            $image->move(public_path('images'), $imageName);
             $category->image = $imageName;
        }

        $category->save();

        return redirect()->route('admin.categorylist')->with('success', 'Category added successfully.');
    } else {
        return redirect()->back()->withErrors($validator)->withInput();
    }
}

    public function edit($id){
        $category = Category::find($id);
        return view('admin.category-edit', compact('category'));
    }
   public function updatecategory(Request $request, $id)
{
    // Validate first
    $validator = Validator::make($request->all(), [
        'name' => 'required|string|max:255',
        'description' => 'nullable|string',
         'status' => 'required|in:active,inactive', // ✅ Add status validation
         'available_items' => 'required|integer|min:0', // ✅ Add available_items validation
        'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    if ($validator->passes()) {
        // 1. Find category (404 if not found)
        $category = Category::findOrFail($id);

        // 2. Update fields
        $category->name = $request->name;
        $category->description = $request->description;
        $category->status = $request->status; // ✅ Update status
        $category->available_items = $request->available_items; // ✅ Update available_items

        // 3. Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($category->image && File::exists(public_path('images/' . $category->image))) {
                @unlink(public_path('images/' . $category->image));
            }

            $image = $request->file('image');
            $imageName = time() . '_' . Str::slug($request->name) . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);

            $category->image = $imageName;
        }

        // 4. Save
        $category->save();

        // 5. Redirect with success
        return redirect()->route('admin.categorylist')->with('success', 'Category updated successfully.');
    } else {
        // Validation failed
        return redirect()->back()
            ->withErrors($validator)
            ->withInput();
    }
}

public function destroy($id)
{
    $category = Category::findOrFail($id);

    // agar image exist karti hai to delete kar do
    if ($category->image && File::exists(public_path('images/' . $category->image))) {
        @unlink(public_path('images/' . $category->image));
    }

    $category->delete();

    return redirect()->route('admin.categorylist')->with('success', 'Category deleted successfully.');
}
public function view($id){
    $category = Category::find($id);
    return view('admin.view', compact('category'));


}
}
