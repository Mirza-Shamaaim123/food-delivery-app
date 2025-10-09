<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


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
        return view('admin.blog-list', compact('blogs'));
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
        ]);

        // ✅ New blog object
        $blog = new Blog();
        $blog->title = $request->title;
        $blog->slug = Str::slug($request->title) . '-' . Str::random(5); // unique slug
        $blog->category = $request->category;
        $blog->content = $request->content;
        $blog->status = $request->status;
        $blog->author_id = Auth::id(); // admin id ya user id

        // ✅ Image upload
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '-' . $file->getClientOriginalName();
            $file->move(public_path('uploads/blogs'), $filename);
            $blog->image = 'uploads/blogs/' . $filename;
        }

        $blog->save();

        // ✅ Redirect or JSON response
        return redirect()->back()->with('success', 'Blog added successfully!');
        // return response()->json(['success' => true, 'message' => 'Blog added successfully!']);
    }
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
