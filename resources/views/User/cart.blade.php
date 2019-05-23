@extends('layoutsUser.layout')
@section('cart','active open')
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
                                    <li class="breadcrumb-item active">Cart</li>
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
            <div class="card product_item_list cart-page">
                <div class="body">
                    <div class="table-responsive">
                        <table class="table table-hover m-b-0 cart-table">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Image</th>
                                    <th>Product Name</th>
                                    <th>Quantity</th>
                                    <th data-breakpoints="xs">Amount</th>
                                    <th data-breakpoints="sm xs md">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $count = 1;
                                    $jumlah = 0;
                                @endphp
                                @foreach ($data_cookie as $data)
                                    <tr>
                                        <td><img src="/{{$data->image_name}}" width="40" alt="Product img"></td>
                                        <td><h5>{{$data->product_name}}</h5></td>
                                        <td>
                                            <div class="quantity-grp">
                                                <div class="input-group spinner" data-trigger="spinner">
                                                    @if ($count == 1)
                                                        <span class="input-group-addon">
                                                            <a href="javascript:void(0);" id="min_item" data-item="{{$loop->iteration}}" data-id="{{$data->product_id}}"  class="spin-down" data-spin="down"><i class="zmdi zmdi-minus"></i></a>
                                                        </span>
                                                        <input type="text" id="{{$loop->iteration}}" min="0" max="100" name="qty" value="{{$data->qty}}" class="form-control text-center">
                                                        <span class="input-group-addon">
                                                            <a href="javascript:void(0);" id="add_item" data-item="{{$loop->iteration}}" data-id="{{$data->product_id}}" class="spin-up" data-spin="up"><i class="zmdi zmdi-plus"></i></a>
                                                        </span>
                                                        
                                                    @else
                                                        <span class="input-group-addon">
                                                            <a href="javascript:void(0);" id="min_item" data-item="{{$loop->iteration.$count}}" data-id="{{$data->product_id}}"  class="spin-down" data-spin="down"><i class="zmdi zmdi-minus"></i></a>
                                                        </span>
                                                        <input type="text" id="{{$loop->iteration.$count}}" min="0" max="100" name="qty" value="{{$data->qty}}" class="form-control text-center">
                                                        <span class="input-group-addon">
                                                            <a href="javascript:void(0);" id="add_item" data-item="{{$loop->iteration.$count}}" data-id="{{$data->product_id}}" class="spin-up" data-spin="up"><i class="zmdi zmdi-plus"></i></a>
                                                        </span>
                                                        
                                                    @endif
                                                </div>
                                            </div>
                                        </td>
                                        {{-- @if (empty($data->discount))
                                            @php $data->selling = $data->price; @endphp
                                        @endif --}}

                                        <input type="hidden" id="selling-{{$loop->iteration}}" value="{{$data->selling}}">
                                        <td>Rp. {{number_format($data->selling, 0,',','.')}}</td>
                                       
                                        <td>
                                            <a href="/delete_item/{{$data->product_id}}" class="btn btn-sm btn-default waves-effect waves-float waves-red"><i class="zmdi zmdi-delete"></i></a>
                                        </td>
                                    </tr>
                                    @php
                                        $jumlah += $data->qty*$data->selling;
                                        $count++;
                                    @endphp
                                @endforeach        
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th colspan="3">Subtotal</th>
                                    <th colspan="1" id="total_price">Rp. {{number_format($jumlah, 0,',','.')}}</th>
                                    <th><a href="/checkout" class="btn btn-sm btn-default waves-effect waves-float waves-red"><i class=""></i> Checkout</a></th>
                                </tr>
                            </tfoot>
                        </table>
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
    
            $(document).on('click', "#min_item", function() {
                $(this).addClass('item_clicked');
                var id = $('.item_clicked').data('id');
                var item = $('.item_clicked').data('item');
                var another = $('.item_clicked').data('another');
    
                var qty = $('#'+item).val();
                var diskon = $('#discount-'+item).val();
                var selling = $('#selling-'+item).val();
    
                var jumlah = parseInt(qty) - 1;
    
                if (jumlah < 0) {
                    jumlah = 0;
                }
    
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