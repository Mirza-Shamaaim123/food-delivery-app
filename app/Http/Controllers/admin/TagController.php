<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $tags = Tag::all();
        
        
        return view('admin.tag-list', compact('tags'));

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
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'status' => 'required|in:active,inactive',

        ]);

        if ($validator->passes()) {
            $tag = new Tag();
            $tag->name = $request->name;
            $tag->status = $request->status;
            $tag->save();
            return redirect()->route('admin.tag')
                ->with('success', 'Tag added successfully.');
        }
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'name' => 'required|string|max:255',
            'status' => 'required|in:active,inactive',
        ]);

        $tag = Tag::findOrFail($id);
        $tag->name = $request->name;
        $tag->status = $request->status;
        $tag->save();

        return redirect()->back()
            ->with('success', 'Tag updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $tag = Tag::findOrFail($id);
        $tag->delete();
        return redirect()->route('admin.tag')
            ->with('success', 'Tag deleted successfully.');
    }
}
