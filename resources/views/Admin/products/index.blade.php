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
                    <div class="button-item">
                            <a href="{{route('products.create')}}" class="btn btn-success waves-effect waves-light">
                             [+] Tambah Produk</a>
                        </div>
                </div>
                <h4 class="page-title">Data Produk</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card m-b-30">
                <div class="card-body">

                    <h4 class="mt-0 header-title">Daftar Produk</h4>
                    <table id="datatable" class="table table-bordered">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Produk</th>
                            <th>Price</th>
                            <th>Stock</th>
                            <th>Action</th>
                        </tr>
                        </thead>

                        <tbody>
                            <?php $no = 0;?>
                            @foreach ($products as $pro)
                            <?php $no++ ;?>
                            
                                <tr>
                                    <td>{{ $no }}</td>
                                    <td>{{$pro->product_name}}</td>
                                    <td>Rp {{$pro->price}}</td>
                                    <td>{{$pro->stock}} pcs</td>
                                    <form action="{{route('products.destroy',$pro->id)}}" method="post" class="form-inline">
                                    <td colspan="1">
                                        <a href="{{route('products.edit',$pro->id)}}" class="btn btn-info">
                                        <i class="mdi mdi-pencil"></i></a>
                                        <a href="{{route('products.show',$pro->id)}}" class="btn btn-warning">
                                        <i class="mdi mdi-eye"></i></a>
                                        @csrf
                                        <input type="hidden" name="_method" value="delete">
                                        <button type="submit" class="btn btn-danger"><i class="mdi mdi-delete"></i></a>
                                    </td>
                                </tr>
                            </form>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    
@endsection