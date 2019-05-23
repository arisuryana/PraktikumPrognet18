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
        <div class="col-lg-12">
            <div class="card">
                <div class="header">
                    <h2><strong>History</strong> Belanja </h2>
                </div>
                <div class="body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover js-basic-example dataTable" id="profile">
                            <thead>
                                <tr>
                                    <th>Timeout</th>
                                    <th>Product</th>
                                    <th>Sub Total</th>
                                    <th>Shipping</th>
                                    <th>Total</th>
                                    <th>Bukti Pembayaran</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Timeout</th>
                                    <th>Product</th>
                                    <th>Sub Total</th>
                                    <th>Shipping</th>
                                    <th>Total</th>
                                    <th>Bukti Pembayaran</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach ($transaction as $data)
                                    <tr>
                                        @if ($data->status == 'success')
                                            <td>Transaction Success</td> 
                                        @elseif($data->status == 'expired')
                                            <td>Transaction Has Been Expired</td>
                                        @elseif($data->status == 'delivered')
                                            <td>Transaction Has Been Delivered</td>
                                        @elseif($data->status == 'verified')
                                            <td>Transaction Has Been Verified</td>
                                        @elseif($data->status == 'unverified')
                                            @if ($data->proof_of_payment != null)
                                                <td>Transaction UnVerified</td>  
                                            @else
                                                <td id="timeout{{$data->id}}"></td>
                                            @endif
                                            
                                        @endif
                                        <td>
                                            <table>
                                                @foreach ($transaction_detail as $item)
                                                    @if ($data->id === $item->transaction_id)
                                                        <tr>
                                                            <td style="width:93%;">
                                                                {{$item->product_name}}
                                                            </td>
                                                            <td style="width:10%;">
                                                                x {{$item->qty}} 
                                                            </td>
                                                        </tr>
                                                    @endif
                                                @endforeach
                                            </table>
                                        </td>

                                        <td>Rp. {{number_format($data->sub_total,0,',','.')}}</td>
                                        <td>Rp. {{number_format($data->shipping_cost,0,',','.')}}</td>
                                        <td>Rp. {{number_format($data->total,0,',','.')}}</td>
                                        @if ($data->proof_of_payment != null)
                                            <td style="text-align:center; width:90px;"><img style="width:75px;" src="/{{$data->proof_of_payment}}" alt=""></td>
                                        @else
                                            <td style="text-align:center;"><a href="/upload_bukti/{{$data->id}}"><button class="btn btn-primary"><i style="font-size:20px;" class=""></i>Upload</button></a></td>
                                        @endif
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('contentJquery')
@foreach ($transaction as $item)
@if ($item->status == 'unverified')
    @php
        // echo $now;
        $t1 = Carbon\Carbon::parse($item->timeout);
        $t2 = Carbon\Carbon::parse($now);
        $second = $t2->diffInSeconds($t1);
    @endphp
    <script>
    // window.onload = function clock{{$item->id}}() {
        var timer{{$item->id}};

        timer{{$item->id}} = setInterval(myclock{{$item->id}}, 1000);
        var c{{$item->id}} = {{$second}};
        var id{{$item->id}} = {{$item->id}};

        function myclock{{$item->id}}() {
            --c{{$item->id}};

            var seconds{{$item->id}} = c{{$item->id}} % 60;
            var minutes{{$item->id}} = (c{{$item->id}} - seconds{{$item->id}}) / 60;
            var minutesLeft{{$item->id}} = minutes{{$item->id}} % 60;
            var hours{{$item->id}} = (minutes{{$item->id}} - minutesLeft{{$item->id}}) / 60;

            if (seconds{{$item->id}}.toString().length > 1 && minutesLeft{{$item->id}}.toString().length>1) {
                document.getElementById('timeout'+id{{$item->id}}).innerHTML = hours{{$item->id}} + ":" + minutesLeft{{$item->id}} + ":" + seconds{{$item->id}};
            }
            else if (seconds{{$item->id}}.toString().length < 2 && minutesLeft{{$item->id}}.toString().length>1) {
                document.getElementById('timeout'+id{{$item->id}}).innerHTML = hours{{$item->id}} + ":" + minutesLeft{{$item->id}} + ":0" + seconds{{$item->id}};
            }
            else if (seconds{{$item->id}}.toString().length > 1 && minutesLeft{{$item->id}}.toString().length<2) {
                document.getElementById('timeout'+id{{$item->id}}).innerHTML = hours{{$item->id}} + ":0" + minutesLeft{{$item->id}} + ":" + seconds{{$item->id}};
            }
            else if (seconds{{$item->id}}.toString().length < 2 && minutesLeft{{$item->id}}.toString().length < 2) {
                document.getElementById('timeout'+id{{$item->id}}).innerHTML = hours{{$item->id}} + ":0" + minutesLeft{{$item->id}} + ":0" + seconds{{$item->id}};
            }
        }
    // }
        
    </script> 
@endif   
@endforeach
@endsection