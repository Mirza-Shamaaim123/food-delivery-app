<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\Blog;
use App\Models\Category;

class HomeController extends Controller
{
    //
    // public function index()
    // {
    //     $categories = Category::all();
    //     // latest 4 products

    // }

    public function dashboard()
    {
        return view('userdashboard.dashboard');
    }

    public function order()
    {
        $orders = Order::where('user_id', Auth::id())->get();
        //  dd($orders);
        return view('userdashboard.order', compact('orders'));
    }

    public function profile()
    {
        $user = Auth::user();

        // Get only latest order (not all)
        $latestOrder = Order::where('user_id', $user->id)->latest()->first();

        return view('userdashboard.profile', compact('user', 'latestOrder'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        // ✅ 1️⃣ Validate user input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
        ]);

        // ✅ 2️⃣ Update user basic info
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        // ✅ 3️⃣ Update latest order billing info (if exists)
        $latestOrder = Order::where('user_id', $user->id)->latest()->first();
        if ($latestOrder) {
            $latestOrder->update([
                'billing_phone_number' => $request->phone,
                'billing_street_address' => $request->address,
            ]);
        }

        // ✅ 4️⃣ Redirect with success message
        return back()->with('success', 'Profile updated successfully!');
    }

    public function blog()
    {
        $blogs = Blog::where('status', 1)->latest()->paginate(6); // only published blogs
        $categories = Category::all();
        $recentBlogs = Blog::latest()->take(3)->get();
        return view('frontend.blog', compact('blogs', 'categories', 'recentBlogs'));
    }








    public function about()
    {
        return view('frontend.about');
    }
    public function contact()
    {
        return view('frontend.contact');
    }
}
