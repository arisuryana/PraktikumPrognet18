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
                <h4 class="page-title">Report</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card m-b-30">
                <div class="card-body">
                    <h4 class="mt-0 header-title">Report Perbulan</h4>
                    <table id="datatable" class="table table-bordered">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Tahun</th>
                            <th>Bulan</th>
                            <th>Jumlah Transaksi</th>
                            <th>Total Transaksi</th>
                        </tr>
                        </thead>

                        <tbody>
                            @foreach ($report as $item)
                                <tr class="data-row">
                                    <td>{{ $loop->iteration }}</td>
                                    <td class="courier">{{ $item->tahun }}</td>
                                    <td class="courier">{{ $item->bulan }}</td>
                                    <td class="courier">{{ $item->jumlah_transaksi }}</td>
                                    <td class="courier">Rp. {{ number_format($item->total_transaksi,0,',','.') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    
@endsection