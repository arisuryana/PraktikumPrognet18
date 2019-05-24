@extends('layoutsUser.layout')
@section('invoice','active open')
@section('contentUser')
    <div class="row clearfix">
        <div class="col-lg-12">
            <div class="card">
                <div class="body">
                    <div class="block-header">
                        <div class="row">
                            <div class="col-lg-6 col-md-8 col-sm-12">
                                <h2>Index</h2>
                                <ul class="breadcrumb p-l-0 p-b-0 ">
                                    <li class="breadcrumb-item"><a href="index.html"><i class="icon-home"></i></a></li>
                                    <li class="breadcrumb-item">Profile</li>                                                                                                                      
                                </ul>
                            </div>
                        </div>               
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card">
                <div class="header">                  
                </div>
                <div class="body">
                    <div class="row clearfix">
                        <div class="col-sm-4">
                            <div class="form-group">                                   
                                <input type="text" class="form-control" placeholder="col-sm-4" value="{{$product->product_name}}" readonly/>                                    
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                @if ($selling_price != 0)
                                    <input type="text" class="form-control" placeholder="col-sm-4" value="{{$selling_price}}" readonly/>
                                @else
                                    <input type="text" class="form-control" placeholder="col-sm-4" value="Rp. {{number_format($product->price,0,',','.')}}" readonly/>
                                @endif                                                         
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                @if ($product->product_rate != null)
                                    <input type="text" class="form-control" placeholder="col-sm-4" value="Rate : {{$product->product_rate}}" readonly/>
                                @else
                                    <input type="text" class="form-control" placeholder="col-sm-4" value="Not Rate Yet" />
                                @endif                                    
                            </div>
                        </div>
                    </div>
                    <form action="/review" method="POST">
                        @csrf
                        <input type="hidden" name="transaction_detail_id" value="{{$id_detail}}">
                        <input type="hidden" name="product_id" value="{{$product->id}}">
                        <div class="row clearfix">
                            <div class="col-sm-4">
                                <div class="form-group">                                   
                                    <input type="text" class="form-control" placeholder="col-sm-4" name="name" value="{{Auth::guard('web')->user()->name}}" readonly>                                    
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">                                   
                                    <input type="email" class="form-control" placeholder="col-sm-4" name="email" value="{{Auth::guard('web')->user()->email}}" readonly/>                                   
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">                                   
                                    <input type="number" max="5" min="0" name="rate" class="form-control" placeholder="Your Rate" required/>                                    
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="body">
                                <h2 class="card-inside-title">Review Customer</h2>
                                <div class="row clearfix">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <textarea rows="4" class="form-control no-resize" placeholder="Please type what you want..." name="content" required></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <input type="submit" value="Send Review" class="btn btn-primary">
                                </div>                        
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
@endsection