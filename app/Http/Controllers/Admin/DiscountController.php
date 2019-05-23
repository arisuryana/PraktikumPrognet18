<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Discount;
use App\Products;

class DiscountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $diskon = Products::join('discounts','products.id','=','discounts.id_product')->get();
        return view('Admin.discount.index', compact('diskon'));

        //return $diskon;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $produk = Products::get();
        return view('Admin.discount.create',compact('produk'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $diskon = Discount::create($request->all());

        return redirect()->route('discount.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $diskon = Products::join('discounts','products.id','=','discounts.id_product')
        ->where('discounts.id', $id)->first();
        $produk = Products::get();
        return view('Admin.discount.edit',compact('diskon','produk'));

        //return $diskon;

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $diskon = Discount::where('id', $id)->first();
        $diskon->percentage = $request->percentage;
        $diskon->start = $request->start;
        $diskon->end = $request->end;
        $diskon->id_product = $request->id_product;
        $diskon->save();

        return redirect()->route('discount.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $diskon = Discount::where('id', $id)->delete();
        return redirect()->route('discount.index');
    }
}
