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
                <h4 class="page-title">Respon</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card m-b-30">
                <div class="card-body">
                    <h4 class="mt-0 header-title">Respon Review</h4>
                    <table id="datatable" class="table table-bordered">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Produk</th>
                            <th>Customer</th>
                            <th>Rate</th>
                            <th>Content</th>
                            <th>Action</th>
                        </tr>
                        </thead>

                        <tbody>
                            @foreach ($review_notResponseYet as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->product_name }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->rate }}</td>
                                    <td>{{ $item->content }}</td>
                                    <td style="text-align:center;">
                                        <form action="/admin/detail-response/{{$item->id}}" method="GET">
                                            @csrf
                                            <button type="submit" class="btn btn-primary" title="Show">
                                                <i class="fa fa-eye"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    
@endsection