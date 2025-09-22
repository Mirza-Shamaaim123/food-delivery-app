<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Coupon;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    //
    public function index()
    {
        $coupons = Coupon::all();
        return view('admin.copun-list', compact('coupons'));
    }
    public function store(Request $request)
    {
        // Validate the request data
        $validator = Validator::make($request->all(), [
            'code' => 'required|unique:coupons,code|max:50',
            'discount' => 'required|numeric|min:0',
            'expires_at' => 'required|date|after:today',
            'discount_type' => 'required|in:percentage,fixed', // Add validation for discount_type
            'description' => 'nullable|string|max:255', // Add validation for description (optional)

        ]);
        if ($validator->passes()) {
            $coupon = new Coupon();
            $coupon->code = $request->input('code');
            $coupon->discount = $request->input('discount');
            $coupon->expires_at = $request->input('expires_at');
            $coupon->discount_type = $request->input('discount_type'); // Make sure to save the discount type
            $coupon->description = $request->input('description'); // Save the description if provided

            $coupon->save();

            return redirect()->route('admin.coupons')->with('success', 'Coupon created successfully.');
        };

        // Create a new coupon


    }
    public function update(Request $request, $id)
    {
        // Validate the request data
        $validator = Validator::make($request->all(), [
            'code' => 'required|unique:coupons,code,' . $id . '|max:50',
            'discount' => 'required|numeric|min:0',
            'expires_at' => 'required|date|after:today',
            'discount_type' => 'required|in:percentage,fixed', // Add validation for discount_type
            'description' => 'nullable|string|max:255', // Add validation for description (optional)

        ]);
        if ($validator->passes()) {
            $coupon = Coupon::find($id);
            $coupon->code = $request->input('code');
            $coupon->discount = $request->input('discount');
            $coupon->expires_at = $request->input('expires_at');
            $coupon->discount_type = $request->input('discount_type'); // Make sure to save the discount type
            $coupon->description = $request->input('description'); // Save the description if provided

            $coupon->save();

            return redirect()->route('admin.coupons')->with('success', 'Coupon updated successfully.');
        };
    }
    // public function destroy($id)
    // {
    //     $coupon = Coupon::find($id);
    //     if ($coupon) {
    //         $coupon->delete();
    //         return redirect()->route('admin.coupons')->with('success', 'Coupon deleted successfully.');
    //     }
    //     return redirect()->route('admin.coupons')->with('error', 'Coupon not found.');
    // }
}
