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
                <h4 class="page-title">Kategori Produk</h4>
            </div>
        </div>
    </div>
        <div class="row">
            <div class="col-12">
                <div class="card m-b-30">
                    <div class="card-body">
                        <h4 class="mt-0 header-title">Tambah Kategori</h4>
                        <div class="general-label">
                            <form class="form-horizontal" role="form" action="{{route('categories.store')}}" method="POST">
                                @csrf
                                <div class="form-group row">
                                    {{-- <label class="col-md-2 control-label" for="example-input1-group1">Nama Kurir</label> --}}
                                    <div class="col-md-8">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="mdi mdi-database"></i></span>
                                            </div>
                                            <input type="text" id="category_name" name="category_name" class="form-control" placeholder="Nama Kategori" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-10">
                                        <input type="submit" class="btn btn-success" value="Simpan">
                                        <a href="{{route('categories.index')}}" class="btn btn-danger">Kembali</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
@endsection