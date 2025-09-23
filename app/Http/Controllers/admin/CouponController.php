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
    $validator = Validator::make($request->all(), [
        'code' => 'required|unique:coupons,code|max:50',
        'discount' => 'required|numeric|min:0',
        'expires_at' => 'required|date|after:today',
        'discount_type' => 'required|in:percentage,fixed',
        'description' => 'nullable|string|max:255',
        'status' => 'required|in:active,inactive',
        'usage_limit' => 'nullable|integer|min:1',
        'per_user_limit' => 'nullable|integer|min:1',
        'minimum_cart_amount' => 'nullable|numeric|min:0',
    ]);

    if ($validator->fails()) {
        dd($validator->errors()); // Show exact validation errors
    }

    try {
        $coupon = new Coupon();
        $coupon->code = $request->input('code');
        $coupon->discount = $request->input('discount');
        $coupon->expires_at = $request->input('expires_at');
        $coupon->discount_type = $request->input('discount_type');
        $coupon->description = $request->input('description');
        $coupon->status = $request->input('status');
        $coupon->usage_limit = $request->input('usage_limit');
        $coupon->per_user_limit = $request->input('per_user_limit');
        $coupon->minimum_cart_amount = $request->input('minimum_cart_amount');
        $coupon->save();

        return redirect()->route('admin.coupons')->with('success', 'Coupon created successfully.');
    } catch (\Exception $e) {
        dd($e->getMessage()); // Show DB error if any
    }
}


    // Create a new coupon



    public function update(Request $request, $id)
    {
        // Validate the request data
        $validator = Validator::make($request->all(), [
            'code' => 'required|unique:coupons,code,' . $id . '|max:50',
            'discount' => 'required|numeric|min:0',
            'expires_at' => 'required|date|after:today|date_format:Y-m-d',
            'discount_type' => 'required|in:percentage,fixed',
            'description' => 'nullable|string|max:255',
            'status' => 'required|in:active,inactive', // validate status
            'usage_limit' => 'nullable|integer|min:0',
            'per_user_limit' => 'nullable|integer|min:0',
            'minimum_cart_amount' => 'nullable|numeric|min:0',
        ]);

        if ($validator->passes()) {
            $coupon = Coupon::findOrFail($id);

            $coupon->code = $request->input('code');
            $coupon->discount = $request->input('discount');
            $coupon->expires_at = $request->input('expires_at');
            $coupon->discount_type = $request->input('discount_type');
            $coupon->description = $request->input('description');

            // New fields
            $coupon->status = $request->input('status');
            $coupon->usage_limit = $request->input('usage_limit');
            $coupon->per_user_limit = $request->input('per_user_limit');
            $coupon->minimum_cart_amount = $request->input('minimum_cart_amount');

            $coupon->save();

            return redirect()->route('admin.coupons')->with('success', 'Coupon updated successfully.');
        }

        return redirect()->back()->withErrors($validator)->withInput();
    }

    public function destroy($id)
    {
        $coupon = Coupon::find($id);
        if ($coupon) {
            $coupon->delete();
            return redirect()->route('admin.coupons')->with('success', 'Coupon deleted successfully.');
        }
        return redirect()->route('admin.coupons')->with('error', 'Coupon not found.');
    }
}
