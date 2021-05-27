<?php

namespace App\Http\Controllers;

use App\Http\Requests\CouponRequest;
use Carbon\Carbon;
use App\Models\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coupons = Coupon::all();

        return view('admin.coupons.index', compact('coupons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.coupons.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\request\CouponRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CouponRequest $request)
    {
        $active = (isset($request->active))
            ? true
            : false;

        Coupon::create([
            'name' => $request->name,
            'code' => $request->code,
            'active' => $active,
            'discount_percent' => $request->discount_percent,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date
        ]);

        return redirect()->route('admin.coupons.index')->with('success', 'Cupon creado');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function edit(Coupon $coupon)
    {
        return view('admin.coupons.edit', compact('coupon'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function update(CouponRequest $request, Coupon $coupon)
    {
        $active = (isset($request->active))
            ? true
            : false;

        $coupon->update([
            'name' => $request->name,
            'code' => $request->code,
            'active' => $active,
            'discount_percent' => $request->discount_percent,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date
        ]);

        return redirect()->route('admin.coupons.index')->with('success', 'Cupon actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function destroy(Coupon $coupon)
    {
        //
    }

    public function apply(Request $request)
    {
        if(empty($request->code)) {
            return request()->json(404, [
                'message' => 'Code not found'
            ]);
        }

        $date = Carbon::today();

        $coupon = Coupon::where('code', $request->code)
                    ->where('active', true)
                    ->where('end_date', '>=', $date)
                    ->first();

        if($coupon) {
            return request()->json(200,[
                'porcent' => $coupon->discount_percent
            ]);
        }else {
            return request()->json(404, [
                'message' => 'Code not found'
            ]);
        }
    }
}
