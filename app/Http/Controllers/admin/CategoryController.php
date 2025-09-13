<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;


class CategoryController extends Controller
{
    //
    public function index()
    {
        $category = Category::orderBy('id', 'desc')->get();

        return view('admin.category-list', compact('category'));
    }
    public function add()
    {
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
                $path = $request->file('image')->store('images/category', 'public');
                $category->image = $path; // stored as "images/category/filename.jpg"
            }



            $category->save();

            return redirect()->route('admin.categorylist')->with('success', 'Category added successfully.');
        } else {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    }

    public function edit($id)
    {
        $category = Category::find($id);
        return view('admin.category-edit', compact('category'));
    }
    public function updatecategory(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|in:active,inactive',
            'available_items' => 'required|integer|min:0',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $category = Category::findOrFail($id);

        $category->name = $request->name;
        $category->description = $request->description;
        $category->status = $request->status;
        $category->available_items = $request->available_items;
       if ($request->hasFile('image')) {
                $path = $request->file('image')->store('images/category', 'public');
                $category->image = $path; 
            }

        $category->save();

        return redirect()->route('admin.categorylist')
            ->with('success', 'Category updated successfully.');
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
    public function view($id)
    {
        $category = Category::find($id);
        return view('admin.view', compact('category'));
    }
}
