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
                            <a href="{{route('categories.create')}}" class="btn btn-success waves-effect waves-light">
                             [+] Tambah Kategori</a>
                        </div>
                </div>
                <h4 class="page-title">Kategori Produk</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card m-b-30">
                <div class="card-body">

                    <h4 class="mt-0 header-title">Daftar Kategori</h4>
                    <table id="datatable" class="table table-bordered">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Kategori</th>
                            <th>Action</th>
                        </tr>
                        </thead>

                        <tbody>
                            <?php $no = 0;?>
                            @foreach ($categories as $cat)
                            <?php $no++ ;?>
                            
                                <tr>
                                    <td>{{ $no }}</td>
                                    <td>{{$cat->category_name}}</td>
                                    <form action="{{route('categories.destroy',$cat->id)}}" method="post" class="form-inline">
                                    <td colspan="2">
                                        <a href="{{route('categories.edit',$cat->id)}}" class="btn btn-info">
                                        <i class="mdi mdi-pencil"></i></a>
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