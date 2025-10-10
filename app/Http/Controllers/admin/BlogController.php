<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Tag;


use App\Models\Blog;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $blogs = Blog::orderBy('created_at', 'desc')->get();
        $tags = Tag::all();

        return view('admin.blog-list', compact('blogs', 'tags'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'nullable|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'status' => 'required|boolean',
            'tags' => 'required|array',       // use "tags" instead of "tag_id"
            'tags.*' => 'exists:tags,id',
        ]);

        // ✅ New blog object
        $blog = new Blog();
        $blog->title = $request->title;
        $blog->slug = Str::slug($request->title) . '-' . Str::random(5); // unique slug
        $blog->category = $request->category;
        $blog->content = $request->content;
        $blog->status = $request->status;
        $blog->author_id = Auth::id();
        $blog->tags_ids = json_encode($request->tags_ids); // admin id ya user id

        // ✅ Image upload

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('images/blogs', 'public');
            $blog->image = $path;
        }
        $blog->save();

        // ✅ Redirect or JSON response
        return redirect()->back()->with('success', 'Blog added successfully!');
        // return response()->json(['success' => true, 'message' => 'Blog added successfully!']);
    }




    /**
     * Show the form for editing the specified resource.
     */
    public function update(Request $request, $id)
    {
        // 1️⃣ Validate inputs
        $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'content' => 'required|string',
            'status' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // 2️⃣ Find the blog
        $blog = Blog::findOrFail($id);

        // 3️⃣ Update basic fields
        $blog->title = $request->title;
        $blog->category = $request->category;
        $blog->content = $request->content;
        $blog->status = $request->status;

        // 4️⃣ If new image uploaded, handle it
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($blog->image && Storage::exists('public/' . $blog->image)) {
                Storage::delete('public/' . $blog->image);
            }

            // Store new image
            $path = $request->file('image')->store('uploads/blogs', 'public');
            $blog->image = $path;
        }

        // 5️⃣ Save changes
        $blog->save();

        // 6️⃣ Redirect or return response
        return redirect()->back()->with('success', 'Blog updated successfully!');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);

        // delete old image if exists
        if ($blog->image && Storage::exists('public/' . $blog->image)) {
            Storage::delete('public/' . $blog->image);
        }

        // delete blog record
        $blog->delete();

        return redirect()->back()->with('success', 'Blog deleted successfully!');
    }
}
