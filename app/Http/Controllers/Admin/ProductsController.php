<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Session;
use App\Products;
use App\ProductCategories;
use App\ProductImages;
use App\CategoriesDetail;
use App\Discount;

class ProductsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $products = Products::all();
        return view('Admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $kategori = ProductCategories::all();
        return view('Admin.products.create', compact('kategori'));
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
        $this->validate($request, [
            'product_name' => 'required',
            'images' => 'required',
        ]);

        $produk = Products::create($request->all());
        foreach ($request->kategori as $kategoris) {
            CategoriesDetail::create([
                'product_id' => $produk->id,
                'category_id' => $kategoris,
            ]);
        }
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $destinationPath = public_path('images/product/');
                $filename = $image->getClientOriginalName();
                $image->move($destinationPath, $filename);
                ProductImages::create([
                    'product_id' =>  $produk->id,
                    'image_name' =>  'images/product/'. $filename,
                ]);
            }
        }
        if ($request->get('other')) {
            Discount::create([
                'id_product' => $produk->id,
                'percentage' => $request->input('percentage'),
                'start' => $request->input('start'),
                'end' => $request->input('end'),
                'status' => $request->input('status'),
            ]);
        }

        return redirect()->route('products.index');
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
        $images = ProductImages::select('image_name')->where('product_id', $id)->get();
        $product = Products::where('id', $id)->first();
        $category = CategoriesDetail::join('product_categories','category_id','=','product_categories.id' )
        ->where('product_id', $id)->get();
        return view('Admin.products.show', compact('images','product','category'));
        //return $category;
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
        $product = Products::where('id', $id)->first();
        $images = ProductImages::where('product_id', $id)->get();
        $category = CategoriesDetail::join('product_categories','category_id','=','product_categories.id' )
        ->where('product_id', $id)->get();
        return view('Admin.products.edit', compact('product','images','category'));
        //return (compact('product','images','category'));
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
        CategoriesDetail::where('product_id', $id)->delete();
        ProductImages::where('product_id', $id)->delete();
        Discount::where('id_product', $id)->delete();
        Products::where('id', $id)->delete();
        return redirect()->route('products.index');
    }
}
