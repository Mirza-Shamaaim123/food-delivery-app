<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ReviewController extends Controller
{
    //
    public function index()
    {
        $reviews = Review::with('product')->get();
        return view('admin.review-list', compact('reviews'));
    }
    public function store(Request $request)
    {
        // Validation
        $validated = $request->validate([
            'product_id' => 'required|exists:products,id',
            'name'       => 'required|string|max:255',
            'email'      => 'required|email|max:255',
            'comment'    => 'required|string',
            'rating'     => 'required|integer|min:1|max:5',
            ''
        ]);

        // Review save karna
        Review::create([
            'product_id' => $validated['product_id'],
            'name'       => $validated['name'],
            'email'      => $validated['email'],
            'comment'    => $validated['comment'],
            'rating'     => $validated['rating'],
            'status'     => 'pending', // yahan integer 0 ki jagah 'pending' daalo
        ]);

        // Redirect back with success message
        return back()->with('success', 'Thank you! Your review has been submitted and is pending approval.');
    }
    public function updateStatus(Request $request, $id)
    {
        $review = Review::findOrFail($id);
        $review->status = $request->status; // approved or rejected
        $review->save();

        return redirect()->back()->with('success', 'Review status updated successfully.');
    }
}
