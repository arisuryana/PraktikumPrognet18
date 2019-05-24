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
                <h4 class="page-title">Data Produk</h4>
            </div>
        </div>
    </div>
        <div class="row">
            <div class="col-12">
                <div class="card m-b-30">
                    <div class="card-body">
                        <h4 class="mt-0 header-title">Edit Produk</h4>
                        <div class="general-label">
                            <form name="f1" class="form-horizontal" role="form" action="{{route('products.update',$product->id)}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="_method" value="PUT">
                                <div class="form-group row">
                                    {{-- <label class="col-md-2 control-label" for="example-input1-group1">Nama Kurir</label> --}}
                                    <div class="col-md-8">
                                        <h6 class="text-muted fw-400">Nama Produk :</h6>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="mdi mdi-cart"></i></span>
                                            </div>
                                            <input type="text" id="product_name" name="product_name" class="form-control" placeholder="Nama Produk" value="{{$product->product_name}}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <h6 class="text-muted fw-400">Kategori Produk :</h6>
                                        <div class="input-group mt-2">
                                                <select class="select2 mb-3 select2-multiple" name="kategori[]" style="width: 100%" multiple="multiple" data-placeholder="Choose">
                                                    @foreach ($allKategori as $all)
                                                        <option value="{{$all->id}}" 
                                                            @foreach($category as $row)
                                                                @if ($all->id == $row->category_id)
                                                                    {{'selected'}}		
                                                                @endif
                                                            @endforeach
                                                        >{{$all->category_name}}</option>
                                                    @endforeach
                                                </select>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <h6 class="text-muted fw-400">Harga Produk :</h6>
                                        <div class="input-group mt-2">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="mdi mdi-coin"></i></span>
                                            </div>
                                            <input type="number" min="0" class="form-control" name="price" placeholder="Harga Produk" value="{{$product->price}}" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-4">
                                        <h6 class="text-muted fw-400">Stok Produk :</h6>
                                        <div class="input-group mt-2">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="mdi mdi-timer-sand"></i></span>
                                            </div>
                                            <input type="number" min="0" class="form-control" name="stock" placeholder="Stok Produk" value="{{$product->stock}}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <h6 class="text-muted fw-400">Berat Produk :</h6>
                                        <div class="input-group mt-2">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="mdi mdi-format-line-weight"></i></span>
                                            </div>
                                            <input type="number" min="0" class="form-control" name="weight" placeholder="Berat Produk" value="{{$product->weight}}" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-8">
                                        <h6 class="text-muted fw-400">Deskripsi Produk :</h6>
                                        <div class="input-group mt-2">
                                            <textarea class="form-control" name="description" rows="4" required>{{$product->description}}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">      
                                    <div class="col-md-4">
                                        <h6 class="text-muted fw-400">Gambar Produk</h6>
                                        <div class="input-group mt-2 image-container">
                                            <div class="card-body">
                                                @foreach ($images as $img)
                                                    <input type="file" name="images[]" multiple id="input-file-now" class="dropify" data-default-file="/{{$img->image_name}}"/><br>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-10">
                                        <input type="submit" class="btn btn-success" value="Update">
                                        <a href="{{route('products.index')}}" class="btn btn-danger">Kembali</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
        <script type="text/javascript">
            function enable_text(status){
                //alert(status);
                status=!status;
                document.f1.percentage.disabled = status;
                document.f1.start.disabled = status;
                document.f1.end.disabled = status;
            }
        </script>


@endsection