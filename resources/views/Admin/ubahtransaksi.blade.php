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
                <h4 class="page-title">Transaksi</h4>
            </div>
        </div>
    </div>
        <div class="row">
            <div class="col-12">
                <div class="card m-b-30">
                    <div class="card-body">
                        <h4 class="mt-0 header-title">Ubah Status Transaksi</h4>
                        <div class="general-label">
                            <form class="form-horizontal" role="form" action="/admin/transaksi/{{$id}}" method="POST">
                                @csrf
                                @method("PUT")
                                <div class="row">
                                    <div class="col-lg-8">
                                    <h6 class="text-muted fw-400">Status Transaksi</h6>
                                    <select name="status" class="select2 form-control mb-3 custom-select" style="width: 100%; height:36px;">
                                        @if ($transaksi->status == 'unverified')
                                            <option value="unverified">UnVerified</option>
                                            <option value="delivered">Delivered</option>
                                            <option value="expired">Expired</option>
                                            <option value="success">Success</option>
                                            <option value="verified">Verified</option>
                                        @elseif ($transaksi->status == 'verified')
                                            <option value="verified">Verified</option>
                                            <option value="success">Success</option>
                                            <option value="delivered">Delivered</option>
                                            <option value="expired">Expired</option>
                                            <option value="unverified">UnVerified</option>
                                        @elseif ($transaksi->status == 'expired')
                                            <option value="expired">Expired</option>
                                            <option value="verified">Verified</option>
                                            <option value="success">Success</option>
                                            <option value="delivered">Delivered</option>
                                            <option value="unverified">UnVerified</option>
                                        @elseif ($transaksi->status == 'success')
                                            <option value="success">Success</option>
                                            <option value="delivered">Delivered</option>
                                            <option value="expired">Expired</option>
                                            <option value="unverified">UnVerified</option>
                                            <option value="verified">Verified</option>
                                        @else
                                            <option value="delivered">Delivered</option>
                                            <option value="success">Success</option>
                                            <option value="expired">Expired</option>
                                            <option value="unverified">UnVerified</option>
                                            <option value="verified">Verified</option>
                                        @endif
                                    </select>
                                    </div>
                                </div>
                                <br>
                                <div class="form-group row">
                                    <div class="col-md-10">
                                        <input type="submit" class="btn btn-success" value="Ubah Transaksi">
                                        <a href="/admin/transaksi" class="btn btn-danger">Kembali</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection