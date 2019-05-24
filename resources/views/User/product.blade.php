@extends('layoutsUser.layout')
@section('shopping','active open')
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
                                    <li class="breadcrumb-item">Dashboard</li>                                                                                                                      
                                    <li class="breadcrumb-item active">Product Detail</li>
                                </ul>
                            </div>
                        </div>               
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row clearfix">
        <div class="col-lg-12">
            <div class="card">
                <div class="body">
                    <div class="row">
                        <div class="preview col-lg-4 col-md-12">
                            <div class="preview-pic tab-content">
                                @foreach ($image as $item)
                                    @if ($loop->iteration == 1)
                                        <div class="tab-pane active" id="/{{$item->image_name}}"><img src="/{{$item->image_name}}" alt="" class="img-fluid" /></div>
                                        <input type="hidden" id="selling-{{$loop->iteration}}" value="{{$product->selling}}">
                                    @else
                                        <div class="tab-pane" id="/{{$item->image_name}}"><img src="/{{$item->image_name}}" alt="" class="img-fluid"/></div>
                                    @endif
                                @endforeach
                            </div>
                            <ul class="preview-thumbnail nav nav-tabs">
                                @foreach ($image as $itm)
                                    @if ($loop->iteration == 1)
                                        <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#/{{$itm->image_name}}"><img src="/{{$itm->image_name}}" alt="" /></a></li>
                                    @else
                                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#/{{$itm->image_name}}"><img src="/{{$itm->image_name}}" alt=""/></a></li>
                                    @endif
                                @endforeach
                            </ul>                
                        </div>
                        <div class="details col-lg-8 col-md-12">
                            <h3 class="product-title m-b-0">{{$product->product_name}}</h3>
                            
                            <h4 class="price m-t-0">Harga : <span class="col-amber">Rp. {{number_format($product->price,0,',','.')}}</span></h4>
                            <div class="rating">
                                <div class="stars">
                                    <span class="zmdi zmdi-star col-amber"></span>
                                    <span class="zmdi zmdi-star-outline"></span>
                                </div>
                            </div>
                            <hr>
                            <p class="product-description">{{$product->description}}</p>
                            <hr>
                            <div class="action">
                                @php
                                $data_cookie = json_decode(Cookie::get('cart'),true);
                                $qty = 0;
                                @endphp
                                @if ($data_cookie != null)
                                    @foreach ($data_cookie as $cookie)
                                        @if ($cookie['product_id'] == $product->id)
                                            @php
                                                if ($cookie['qty'] == '' || $cookie['qty'] == null || $cookie['qty'] == 'NaN') {
                                                    $qty = 0;
                                                }
                                                else {
                                                    $qty = $cookie['qty'];
                                                }
                                                break;
                                            @endphp
                                        @endif
                                    @endforeach
                                @endif
                                <input type="hidden" id="1" min="0" max="100" name="qty" value="{{$qty}}">
                                <button id="add_item" data-item="1" data-id="{{$product->id}}" class="btn btn-primary btn-round waves-effect" type="button">add to cart</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="card">
                <ul class="nav nav-tabs">
                    <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#review">Review</a></li>
                </ul>
            </div>
            <div class="card">
                <div class="body">                        
                    <div class="tab-content">
                        <div class="tab-pane active" id="review">
                            <ul class="row list-unstyled c_review">
                            @foreach ($review as $item)
                                <li class="col-12">
                                    <div class="avatar">
                                        <a href="javascript:void(0);"><img class="rounded" src="/assets_front/images/xs/avatar2.jpg" alt="user" width="60"></a>
                                    </div>                                
                                    <div class="comment-action">
                                        <h5 class="c_name">{{$item->user->name}}</h5>
                                        <p class="c_msg m-b-0">{{$item->content}}</p>
                                        <span class="m-l-10">
                                            ({{$item->rate}} <i class="zmdi zmdi-star col-amber"></i>)
                                        </span>
                                        <small class="comment-date float-sm-right">{{\Carbon\Carbon::parse($item->created_at)->format('M d,Y')}}</small>
                                    </div>                                
                                </li>
                            @endforeach                                  
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection    
@section('contentJquery') 
    <script>
        $(document).ready(function() {
    
            $(document).on('click', "#add_item", function() {
                $(this).addClass('item_clicked');
                var id = $('.item_clicked').data('id');
                var item = $('.item_clicked').data('item');
                var another = $('.item_clicked').data('another');
    
                var qty = $('#'+item).val();
                var jumlah = parseInt(qty) + 1;
                var diskon = $('#discount-'+item).val();
                var selling = $('#selling-'+item).val();

                $('#'+item).val(jumlah);
                $('#'+another).val(jumlah);
                for (let index = 1; index < 6; index++) {
                    $('#'+another+index).val(jumlah);
                }
    
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: 'POST',
                    url: '/add_item',
                    data: { 
                        'product_id': id, 
                        'qty': jumlah,
                        'selling': selling,
                        'discount': diskon,
                        
                    },
                    success: function(data){
                        console.log("Success "+data);
                        $('.toggle-minicart').addClass('active');
                    },
                    error: function (data, textStatus, errorThrown) {
                        console.log(data);
                    },
                }); 
    
                $('.item_clicked').removeClass('item_clicked');
    
            });
    
        });
    </script>
@endsection