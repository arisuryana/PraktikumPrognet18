<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Products;
use App\ProductCategories;
use App\ProductImages;
use App\CategoriesDetail;
use Alert;
use DB;

class MenuController extends Controller
{
    //
    public function index()
    {
        

        $this->data['product'] = Products::join('product_images','products.id','product_images.product_id')
        
        ->join('product_category_details','product_category_details.product_id','products.id')
        ->join('product_categories','product_categories.id','product_category_details.category_id')
        ->select('products.*','product_images.*','product_categories.category_name')
        // ->groupBy('product_categories.id')
        ->get();

        $this->data['product_category'] = CategoriesDetail::join('product_categories','product_categories.id','product_category_details.category_id')
        ->join('products','products.id','product_category_details.product_id')
        ->select('products.*','product_categories.category_name')
        ->get();

        $this->data['product_discount'] = Products::join('discounts', 'discounts.id_product','products.id')
        ->where('discounts.status','1')
        ->select('discounts.*', DB::raw('(products.price - ((discounts.percentage/100) * products.price)) as selling'), DB::raw('((discounts.percentage/100) * products.price) as diskon'))
        ->get();


        $this->data['product_image'] = ProductImages::groupBy('product_id')->get();

        $this->data['category'] = ProductCategories::get();
        

        return view('User.menu', $this->data);

    }
}
