<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Products;
use App\ProductReview;
use App\Admin;
use DB;
use Alert;
use Auth;
use App\Discount;
use App\TransactionDetail;
use App\Notifications\AdminNotif;

class ProductReviewController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:web');
    }

    public function productReview($id)
    {
        $id_product = TransactionDetail::join('products','products.id','transaction_details.product_id')
        ->where('transaction_details.id',$id)
        ->select('products.*','transaction_details.status')
        ->first();
        

        $this->data['product'] = Products::join('product_images','products.id','product_images.product_id')
        ->where('products.id',$id_product->id)
        ->select('products.*','product_images.image_name')
        ->first();

        $this->data['id_detail'] = $id;

        // $this->data['selling_price'] = 0;
        
        $discount = Discount::join('products','products.id','discounts.id_product')
        ->where('products.id',$id_product->id)
        ->where('discounts.status','1')
        ->select(DB::raw('(products.price - (products.price * discounts.percentage / 100)) as selling_price'))
        ->get();
        
        if (count($discount) > 0) {
            foreach ($discount as $key) {
                $this->data['selling_price'] = $key->selling_price;
            }
        }
        else{
            $this->data['selling_price'] = 0;
        }
        

        return view('User.product_review',$this->data);
        
    }

    public function store(Request $request)
    {
        // return $request;
        TransactionDetail::where('id',$request->transaction_detail_id)->update([
            'status' => '1',
        ]);
        
        
        $review = new ProductReview;
        $review->product_id = $request->product_id;
        $review->user_id = Auth::guard('web')->user()->id;
        $review->content = $request->content;
        $review->rate = $request->rate;
        $review->save();

        $data = ProductReview::where('product_id',$request->product_id)
        ->select(DB::raw('avg(rate) as product_rate'))
        ->first();

        Products::find($request->product_id)->update([
            'product_rate' => $data->product_rate,
        ]);

        $admin = Admin::find(1);
        $product_name = Products::find($request->product_id)->select('product_name')->first();
        $admin->notify(new AdminNotif("<a href='/admin/response' class='dropdown-item notify-item'><p class='notify-details'><small> Terdapat Review Pada Product ".$product_name->product_name." oleh ".$request->name."</small></p></a>"));

        return redirect('/invoice');
    }
}
