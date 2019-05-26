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
                    <h2><strong>List Review </strong> Produk </h2>
                </div>
                <div class="body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover js-basic-example dataTable" id="profile">
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Product Name</th>
                                    <th>Status Review</th>
                                    <th>Rating</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Image</th>
                                    <th>Product Name</th>
                                    <th>Status Review</th>
                                    <th>Rating</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach ($product as $data)
                                    <tr>
                                        <td style="text-align:center;" >
                                            <img style="width: 90px; height: 90px;" src="/{{$data->image_name}}" alt="">
                                        </td>
                                        <td>
                                            {{$data->product_name}}
                                        </td>
                                        <td>
                                            @if ($data->status == '1')
                                                <a href="javascript:void(0)" class="btn btn-primary">Already Review</a>
                                            @else
                                                <a href="/review/{{$data->id_detail}}" class="btn btn-primary">Review</a>
                                            @endif
                                        </td>
                                        <td>
                                            @if (empty ($data->product_rate))
                                                <div class="highlight">Not Rated Yet</div>
                                            @else
                                                <div class="highlight">Rate : {{$data->product_rate}} <i class="fa fa-star"></i></div>
                                            @endif
                                        </td>
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