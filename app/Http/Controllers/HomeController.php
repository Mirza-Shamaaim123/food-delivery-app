<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;

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
        return view('userdashboard.profile');
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
