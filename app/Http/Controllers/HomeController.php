<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

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
        return view('userdashboard.order');
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
