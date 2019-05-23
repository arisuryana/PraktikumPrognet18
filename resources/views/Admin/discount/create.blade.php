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
                <h4 class="page-title">Diskon</h4>
            </div>
        </div>
    </div>
        <div class="row">
            <div class="col-12">
                <div class="card m-b-30">
                    <div class="card-body">
                        <h4 class="mt-0 header-title">Tambah Diskon</h4>
                        <div class="general-label">
                            <form class="form-horizontal" role="form" action="{{route('discount.store')}}" method="POST">
                                @csrf
                                <div class="form-group row">
                                    <div class="col-md-8">
                                        <h6 class="text-muted fw-400">Diskon Produk :</h6>
                                        <div class="input-group mt-2">
                                            <input type="number" min="0" name="percentage" class="form-control">
                                            <div>
                                                <div class="input-daterange input-group">
                                                    <input type="date" name="start" class="form-control" placeholder="Start Date" />
                                                    <input type="date" name="end" class="form-control" placeholder="End Date" />
                                                    <input type="hidden" name="status" value="1" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-8">
                                    <h6 class="text-muted fw-400">Nama Produk</h6>
                                    <select name="id_product" class="select2 form-control mb-3 custom-select" style="width: 100%; height:36px;">
                                        <option>Select</option>
                                        @foreach ($produk as $itm)
                                            <option value="{{ $itm->id }}">{{ $itm->product_name }}</option>
                                        @endforeach
                                    </select>
                                    </div>
                                </div>
                                <br>
                                <div class="form-group row">
                                    <div class="col-md-10">
                                        <input type="submit" class="btn btn-success" value="Simpan">
                                        <a href="{{route('discount.index')}}" class="btn btn-danger">Kembali</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
@endsection