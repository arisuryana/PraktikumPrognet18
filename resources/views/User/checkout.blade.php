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
                                    <li class="breadcrumb-item active">CheckOut</li>
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
                            @if($data_cookie != null)
                                @foreach ($data_cookie as $item)
                                    <tr>
                                        <td><img src="/{{$item->image_name}}" width="40" alt="Product img"></td>
                                        <td><h5>{{$item->product_name}}</h5></td>
                                        <td>
                                            <div class="quantity-grp">
                                                <div class="input-group spinner" data-trigger="spinner">
                                                    <input type="text" id="qty" min="0" max="100" name="qty" value="{{$item->qty}}" class="form-control text-center">
                                                </div>
                                            </div>
                                        </td>
                                        {{-- @if (empty($item->discount))
                                            @php $item->selling = $item->price; @endphp
                                        @endif --}}
                                        <td>Rp. {{number_format($item->selling, 0,',','.')}}</td>
                                        {{-- <input type="hidden" id="selling-{{$loop->iteration}}" value="{{$item->selling}}"> --}}
                                        <td>
                                            <a href="/delete_item/{{$item->product_id}}" class="btn btn-sm btn-default waves-effect waves-float waves-red"><i class="zmdi zmdi-delete"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <th colspan="5"><a href="/menu" class="btn btn-sm btn-default waves-effect waves-float waves-red"><i class=""></i>Order Some Product</a></th>
                                </tr>
                            @endif
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th colspan="3">Subtotal</th>
                                    <th colspan="1">Rp. {{number_format($total_price, 0,',','.')}}</th>
                                </tr>
                                <tr>
                                    <th colspan="3">Shipping</th>
                                    <th colspan="1"><a id="shipping"></a></th>
                                </tr>
                                <tr>
                                    <th colspan="3">Total</th>
                                    <th colspan="1"><a id="payment">Rp. {{number_format($total_price,0,',','.')}}</a></th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row clearfix">
        <div class="card">
            <div class="body">
                <h2 class="card-inside-title">Data Pembeli</h2>
                <div class="row clearfix">
                    <div class="col-sm-6">
                        <div class="form-group">                                    
                            <input type="text" class="form-control" placeholder="nama" value="{{Auth::guard('web')->user()->name}}" id="billing_name" readonly/>                                   
                        </div>
                    </div>
                </div>
                <div class="row clearfix">
                    <div class="col-sm-6">
                        <div class="form-group">                                   
                            <input type="text" class="form-control" placeholder="email" value="{{Auth::guard('web')->user()->email}}" id="billing_email" readonly/>                                    
                        </div>
                    </div>
                </div>
                <form action="/checkedout" method="POST">
                    @csrf
                    <input type="hidden" name="sub_total" value="{{$total_price}}">
                    <input type="hidden" name="weight" value="{{$total_weight}}">
                    <h2 class="card-inside-title">Delivery Info</h2>
                    <div class="row clearfix">
                        <div class="col-lg-3 col-md-6">
                            <p> <b>Kota Tinggal</b> </p>
                            <select class="form-control z-index show-tick" data-live-search="true" list="city" name="kota" id="billing_city">
                                @foreach ($data_kota as $item)
                                    <option>{{$item['city_name']}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-sm-6">
                            <p> <b>Alamat</b> </p>
                            <div class="form-group">                                   
                                <input type="text" class="form-control" name="alamat" placeholder="Alamat Lengkap" id="billing_address_1" required/>                                    
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-3 col-md-6">
                            <p> <b>Kurir</b> </p>
                            <select class="form-control z-index show-tick" data-live-search="true" list="city" name="courier" id="billing_courier">
                                @foreach ($data_courier as $item)
                                    <option>{{$item->courier}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <input type="button" value="Cek Shipping" id="cek_shipping" class="btn btn-raised btn-primary waves-effect btn-round">

                    <input type="submit" value="Confirm &amp; Checkout" class="btn btn-raised btn-primary waves-effect btn-round">
                </form>
            </div>
        </div>
    </div>

@endsection
@section('contentJquery') 
<script>
$(document).ready(function() {
    $('#cek_shipping').click(function(){
        $('#cek_shipping').attr("disabled", true);

        var courier = $('#billing_courier').val();
        var destination = $('#billing_city').val();
        var weight = {{$total_weight}};
        var price = {{$total_price}};
        
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'POST',
            url: '/shipping',
            data: { 
                'destination': destination, 
                'courier': courier,
                'weight' : weight
            },
            success: function(data){
                console.log("Success "+data.cost);
                $('#cek_shipping').attr("disabled", false);
                $('#cek_shipping').addClass("disabled");
                $('#shipping').html(formatRupiah(data.cost.toFixed(0), "Rp. "));
                //$('#shipping').html(data.cost);
                    
                var total = data.cost + price;
                
                $('#payment').html(formatRupiah(total.toFixed(0), "Rp. "));
            },
            error: function (data, textStatus, errorThrown) {
                console.log(data);
                $('#cek_shipping').attr("disabled", false);
                $('#cek_shipping').removeClass("disabled");
            },
        }); 
    });
});
</script>
@endsection