<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Products;
use App\ProductImages;
use App\CategoriesDetail;
use App\Discount;
use DB;
use App\ProductReview;

class ProductController extends Controller
{
    public function product($id_product)
    {
        

        $this->data['product_id'] = $id_product;
        $this->data['product'] = Products::where('id',$id_product)->first();
        $this->data['category'] = CategoriesDetail::join('product_categories','product_category_details.category_id','product_categories.id')
        ->where('product_id',$id_product)->get();
        
        $this->data['image'] = ProductImages::where('product_id',$id_product)->get();
        $this->data['discount'] = Discount::where('id_product',$id_product)->orderBy('id', 'DESC')->first();

        $this->data['review'] = ProductReview::where('product_id',$id_product)
        ->get();

        $this->data['count'] = ProductReview::where('product_id',$id_product)
        ->join('users','users.id','product_reviews.user_id')
        ->count();

        
        return view('User.product',$this->data);

        //return $this->data;
    }
}
