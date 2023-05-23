<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CouponsController extends Controller
{
    public function CouponView()
    {
        $coupons = Coupon::orderBy('id', 'DESC')->get();
        return view('backend.coupon.view_coupon', compact('coupons'));
    }
    public function CouponStore(Request $request)
    {
        $request->validate([
            'coupon_name' => 'required',
            'coupon_discount' => 'required|numeric',
            'coupon_validity' => 'required',
        ], [
            'coupon_name.required' => 'Input Coupon Name',
            'coupon_discount.required' => 'Input Coupon Discount',
            'coupon_discount.numeric' => 'Coupon Discount must be a numeric value',
            'coupon_validity.required' => 'Select Coupon Date',
        ]);

        Coupon::insert([
            'coupon_name' => strtoupper($request->coupon_name),
            'coupon_discount' => $request->coupon_discount,
            'coupon_validity' => $request->coupon_validity,
            'created_at' => Carbon::now(),
        ]);

        $notification = [
            'message' => 'Coupon Inserted Successfully',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);
    }
    public function CouponEdit($id){
        $coupons = Coupon::findOrFail($id);
           return view('backend.coupon.edit_coupon',compact('coupons'));
    }
    public function CouponUpdate(Request $request, $id){
        Coupon::findOrFail($id)->update([
            'coupon_name' => strtoupper($request->coupon_name),
            'coupon_discount' => $request->coupon_discount,
            'coupon_validity' => $request->coupon_validity,
            'created_at' => Carbon::now(),
        ]);

        $notification = [
            'message' => 'Coupon Updated Successfully',
            'alert-type' => 'info'
        ];
        return redirect()->route('manage-coupon')->with($notification);
    }

    public function CouponDelete($id){
       Coupon::findOrFail($id)->delete();
       $notification = [
        'message' => 'Coupon Deleted Successfully',
        'alert-type' => 'info'
    ];
    return redirect()->back()->with($notification);
    }

}
