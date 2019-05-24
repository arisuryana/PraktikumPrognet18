<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Response;
use App\ProductReview;
use Alert;
use Auth;
use App\User;

class ResponseController extends Controller
{
    public function index()
    {
        
        $this->data['response'] = Response::get();
        $id[] = "";
        foreach ($this->data['response'] as $key) {
            $id[] = $key->review_id;
        }
        if ($id == null) {
            $this->data['review_notResponseYet'] = ProductReview::join('products','products.id','product_reviews.product_id')
        ->join('users','users.id','product_reviews.user_id')
        ->select('product_reviews.*','products.product_name','users.name')
        ->get();
        }
        else {
            $this->data['review_notResponseYet'] = ProductReview::join('products','products.id','product_reviews.product_id')
        ->join('users','users.id','product_reviews.user_id')
        ->select('product_reviews.*','products.product_name','users.name')
        ->whereNotIn('product_reviews.id', $id)
        ->get();
        }
        
        $data[] = "";
        foreach ($this->data['review_notResponseYet'] as $item) {
            $data[] = $item->id;
        }

        if ($data == null) {
            $this->data['review_response'] = ProductReview::join('products','products.id','product_reviews.product_id')
        ->join('users','users.id','product_reviews.user_id')
        ->select('product_reviews.*','products.product_name','users.name')
        ->get();
        }
        else {
            $this->data['review_response'] = ProductReview::join('products','products.id','product_reviews.product_id')
        ->join('users','users.id','product_reviews.user_id')
        ->select('product_reviews.*','products.product_name','users.name')
        ->whereNotIn('product_reviews.id', $data)
        ->get();
        }
        
        return view('Admin.response', $this->data);
    }

    public function showDetail($id)
    {
        $this->data['review'] = ProductReview::join('products','products.id','product_reviews.product_id')
        ->join('users','users.id','product_reviews.user_id')
        ->select('product_reviews.*','products.product_name','users.name')
        ->where('product_reviews.id',$id)->first();
        $this->data['no_response'] = "1";
        
        return view('Admin.detail_response', $this->data);
    }

    public function store(Request $request)
    {
       
        $response = new Response;
        $response->review_id = $request->review_id;
        $response->admin_id = Auth::guard('admin')->user()->id;
        $response->content = $request->content;
        $response->save();

        $review_user = ProductReview::where('id',$request->review_id)
        ->first();

        //Alert::success('Success Message', 'Response Success')->persistent("Close");

        return redirect('/admin/response');
    }
}
