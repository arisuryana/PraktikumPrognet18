@extends('layoutsAdmin.layout')

@section('contentAdmin')
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="btn-group float-right">
                    {{-- <ol class="breadcrumb hide-phone p-0 m-0">
                        <li class="breadcrumb-item"><a href="#">Admin</a></li>
                        <li class="breadcrumb-item active">Kurir</li>
                    </ol> --}}
                </div>
                <h4 class="page-title">Balas Response</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Review</h3>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Name</label>
                                <input type="email" class="form-control" value="{{$review->name}}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Product Name</label>
                                <input type="email" class="form-control" value="{{$review->product_name}}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Rate</label>
                                <input type="email" class="form-control" value="{{$review->rate}}" readonly>
                            </div>
                            <div class="form-group">
                                <label>Content</label>
                                <textarea class="form-control" readonly rows="3">{{$review->content}}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-6">
            <div class="box box-primary">
                <form action="/admin/response" method="POST">
                    @csrf
                    <div class="box-header with-border">
                        <h3 class="box-title">Response</h3>
                    </div>
                    <input type="hidden" name="review_id" value="{{$review->id}}">
                    <div class="box-body">
                        
                            @if ($no_response == "1")
                                <div class="form-group">
                                    <label>Content</label>
                                    <textarea class="form-control" name="content" rows="5" placeholder="Enter . . ."></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            @elseif($no_response == "0")
                            @foreach ($response as $item)
                                <div class="form-group">
                                    <label>Admin Name</label>
                                    <input type="text" readonly class="form-control" value="{{$item->name}}" >
                                </div>
                                <div class="form-group">
                                    <label>Content</label>
                                    <textarea readonly class="form-control" name="content" rows="5" placeholder="Enter . . .">{{$item->content}}</textarea>
                                </div>
                            @endforeach
                            @endif
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    
@endsection