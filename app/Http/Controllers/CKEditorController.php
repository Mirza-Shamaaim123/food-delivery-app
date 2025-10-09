<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CKEditorController extends Controller
{
    public function upload(Request $request)
    {
        if ($request->hasFile('upload')) {
            // ✅ Save image to the same path as blog images
            $path = $request->file('upload')->store('images/blogs', 'public');

            // ✅ Get full public URL
            $url = asset('storage/' . $path);

            // ✅ Required response format for CKEditor
            return response()->json([
                'uploaded' => true,
                'url' => $url
            ]);
        }

        return response()->json(['uploaded' => false, 'error' => ['message' => 'No file uploaded.']]);
    }
}
