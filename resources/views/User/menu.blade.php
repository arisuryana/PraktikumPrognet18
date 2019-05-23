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
                                    <li class="breadcrumb-item active">Menu</li>
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
                <ul class="nav nav-tabs">
                @foreach ($category as $item)
                    @if ($loop->iteration == 1)
                        <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#{{$item->category_name}}">{{$item->category_name}}</a></li>
                    @else
                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#{{$item->category_name}}">{{$item->category_name}}</a></li>
                    @endif
                @endforeach    
                </ul>
            </div>
        </div> 
    </div>

    <div class="row clearfix">
        <div class="col-lg-12">
            <div class="body">                        
                <div class="tab-content">
                    @php
                        $count = 1;
                    @endphp
                    @foreach ($category as $item)
                    {{-- Category --}}
                    <div class="tab-pane
                    @if ($count == 1)
                         {{'active'}}
                    @else
                        {{''}}
                    @endif
                    " id="{{$item->category_name}}">
                        <div class="row clearfix">
                        @foreach ($product_category as $data)
                            @if ($item->category_name == $data->category_name)
                                @foreach ($product_image as $image)
                                    @if ($data->id == $image->product_id)
                                    <div class="col-lg-3 col-md-4 col-sm-12">
                                        <div class="card product_item">
                                            <div class="body">
                                                <div class="cp_img">
                                                    <img src="/{{$image->image_name}}" alt="Product" class="img-fluid" />
                                                    <div class="hover">
                                                        @php
                                                            $data_cookie = json_decode(Cookie::get('cart'),true);
                                                            $qty = 0;
                                                        @endphp
                                                        @if ($data_cookie != null)
                                                            @foreach ($data_cookie as $cookie)
                                                                @if ($cookie['product_id'] == $data->id)
                                                                    @php
                                                                        if ($cookie['qty'] == '' || $cookie['qty'] == null || $cookie['qty'] == 'NaN') {
                                                                            $qty = 0;
                                                                        }
                                                                        else {
                                                                            $qty = $cookie['qty'];
                                                                        }
                                                                        break;
                                                                    @endphp
                                                                @else
                                                                    @php
                                                                        $qty = 0;
                                                                    @endphp
                                                                @endif
                                                            @endforeach
                                                        @endif
                                                        
                                                        @if ($count == 1)
                                                            <input type="hidden" id="{{$loop->iteration}}" min="0" max="100" name="qty" 
                                                            value="{{$qty}}">
                                                        @else
                                                            <input type="hidden" id="{{$loop->iteration.$count}}" min="0" max="100" name="qty" 
                                                            value="{{$qty}}">
                                                        @endif

                                                        @if ($count == 1)
                                                            <a href="javascript:void(0);" id="add_item" data-item="{{$loop->iteration}}" data-another="{{$loop->iteration}}" data-id="{{$data->id}}" class="btn btn-raised btn-primary waves-effect btn-round" data-type="success"><i class="zmdi zmdi-shopping-cart"></i></a>
                                                        @else
                                                            <a href="javascript:void(0);" id="add_item"  data-item="{{$loop->iteration.$count}}" data-another="{{$loop->iteration}}" data-id="{{$data->id}}" class="btn btn-raised btn-primary waves-effect btn-round" data-type="success"><i class="zmdi zmdi-shopping-cart"></i></a>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="product_details prices">
                                                    @php
                                                    $check = 0;
                                                    @endphp
                                                    @foreach ($product_discount as $discount)
                                                        @if ($discount->id_product == $data->id)
                                                            @php
                                                                $check = $discount->selling;
                                                                $diskon_produk = $discount->diskon;
                                                            @endphp
                                                        @endif
                                                    @endforeach
                                                    <h5><a href="/product/{{$data->id}}">{{$data->product_name}}</a></h5>
                                                    <ul class="product_price list-unstyled">
                                                    @if ($check != 0)
                                                        @if ($count == 1)
                                                            <input type="hidden" id="discount-{{$loop->iteration}}" value="{{$diskon_produk}}">
                                                            <input type="hidden" id="selling-{{$loop->iteration}}" value="{{$check}}">
                                                        @else  
                                                            <input type="hidden" id="discount-{{$loop->iteration.$count}}" value="{{$diskon_produk}}">
                                                            <input type="hidden" id="selling-{{$loop->iteration.$count}}" value="{{$check}}">
                                                        @endif
                                                        
                                                        <li class="old_price">Rp. {{number_format($data->price, 0,',','.')}}</li>
                                                        <li class="new_price">Rp. {{number_format($check,0,',','.')}}</li>
                                                    @else
                                                        @if ($count == 1)
                                                            <input type="hidden" id="discount-{{$loop->iteration}}" value="0">
                                                            <input type="hidden" id="selling-{{$loop->iteration}}" value="{{$data->price}}">
                                                        @else
                                                            <input type="hidden" id="discount-{{$loop->iteration.$count}}" value="0">
                                                            <input type="hidden" id="selling-{{$loop->iteration.$count}}" value="{{$data->price}}">
                                                        @endif
                                                        <li class="old_price">Rp. {{number_format($data->price,0,',','.')}}</li>
                                                    @endif
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>      
                                    </div>
                                    @endif
                                @endforeach
                            @endif
                            {{-- Menu Item --}}   
                        
                        @endforeach  
                        </div>   
                    </div>
                    @php
                        $count++;
                    @endphp
                    @endforeach
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
            swal("Good job !", "Your Product Added in Cart", "success");

            var id = $('.item_clicked').data('id');
            var item = $('.item_clicked').data('item');
            var another = $('.item_clicked').data('another');
    
            var qty = $('#'+item).val();
            var diskon = $('#discount-'+item).val();
            var selling = $('#selling-'+item).val();
    
            var jumlah = parseInt(qty) + 1;
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
                    'discount': diskon
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