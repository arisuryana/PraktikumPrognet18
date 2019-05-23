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
                <h4 class="page-title">Ganti Status</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card m-b-30">
                <div class="card-body">
                    <h4 class="mt-0 header-title">Ganti Status Pembayaran</h4>
                    <table id="datatable" class="table table-bordered">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Customer</th>
                            <th>Nama Produk</th>
                            <th>Sub Total</th>
                            <th>Shipping</th>
                            <th>Total</th>
                            <th>Bukti Pembayaran</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>

                        <tbody>
                            <?php $no = 0;?>
                            @foreach ($transaksi as $data)
                            <?php $no++ ;?>
                                <tr>
                                    <td>{{ $no }}</td>
                                    <td>{{ $data->user->name }}</td>
                                    <td>
                                        <ul>
                                        @foreach ($data->product_detail as $item)
                                            <li>{{ $item->product_name }}</li>
                                        @endforeach                  
                                        </ul>
                                    </td>
                                    <td>Rp. {{ number_format($data->sub_total,0,',','.') }}</td>
                                    <td>Rp. {{ number_format($data->shipping_cost,0,',','.') }}</td>
                                    <td>Rp. {{ number_format($data->total,0,',','.') }}</td>
                                    <td style="text-align:center;"><img style="width:100px;" src="/{{$data->proof_of_payment}}" alt=""></td>
                                    <td>{{$data->status}}</td>
                                    <td style="text-align:center;">
                                        <button type="button" id="edit-item" data-item-id="{{$data->id}}" class="btn btn-warning" title="Edit">
                                            <i class="">Ganti Status</i>
                                        </button>
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