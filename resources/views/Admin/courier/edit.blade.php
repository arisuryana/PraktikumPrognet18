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
                <h4 class="page-title">Kurir</h4>
            </div>
        </div>
    </div>
        <div class="row">
            <div class="col-12">
                <div class="card m-b-30">
                    <div class="card-body">
                        <h4 class="mt-0 header-title">Update Kurir</h4>
                        <div class="general-label">
                            <form class="form-horizontal" role="form" action="{{route('courier.update',$courier->id)}}" method="POST">
                                @csrf
                                <input type="hidden" name="_method" value="PUT">
                                <div class="form-group row">
                                    {{-- <label class="col-md-2 control-label" for="example-input1-group1">Nama Kurir</label> --}}
                                    <div class="col-md-8">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="mdi mdi-truck"></i></span>
                                            </div>
                                            <input type="text" id="courier" name="courier" class="form-control" placeholder="Nama Kurir" value="{{$courier->courier}}" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-10">
                                        <input type="submit" class="btn btn-success" value="Update">
                                        <a href="{{route('courier.index')}}" class="btn btn-danger">Kembali</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
@endsection