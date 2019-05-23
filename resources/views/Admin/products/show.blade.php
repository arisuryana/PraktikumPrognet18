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
                <h4 class="page-title">Detail Produk</h4>
            </div>
        </div>
    </div>
    <div class="row">
        
            <div class="col-sm-6">
                <div class="card m-b-20">
                    <div class="card-body" style="height:340px;">
                        <h4 class="mt-0 header-title">Gambar Produk</h4>
                        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner" role="listbox">
                                @foreach ($images as $img)
                                    @if ($loop->iteration == 1)
                                            <div class="carousel-item active">
                                                <img class="d-block img-fluid" src="/{{$img->image_name}}" style="margin-left: auto;margin-right: auto;">
                                            </div>
                                        @else
                                            <div class="carousel-item">
                                                <img class="d-block img-fluid" src="/{{$img->image_name}}" style="margin-left: auto;margin-right: auto;">
                                            </div>
                                    @endif
                                @endforeach
                                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- end col -->
            <div class="col-sm-6">
                <div class="card m-b-20">
                    <div class="card-body">
                        <h4 class="mt-0 header-title">Detail Produk</h4>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" value="{{$product->product_name}}" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Harga</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" value="Rp. {{$product->price}}" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Stok</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" value="{{$product->stock}} pcs" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Berat</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" value="{{$product->weight}} gram" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Rating</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" value="{{$product->product_rate}}" readonly>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    <div class="row">
            <div class="col-sm-12">
                    <div class="card m-b-20">
                        <div class="card-body">
                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="tab" href="#kategori" role="tab">Kategori</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#deskripsi" role="tab">Deskripsi</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#ulasan" role="tab">Ulasan</a>
                                    </li>
                                </ul>

                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div class="tab-pane active p-3" id="kategori" role="tabpanel">
                                        @foreach ($category as $cat)
                                            <div class="form-group row">
                                                <div class="col-md-4">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="mdi mdi-tag-multiple"></i></span>
                                                        </div>
                                                        <input type="text" name="category" class="form-control" value="{{$cat->category_name}}" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="tab-pane p-3" id="deskripsi" role="tabpanel">
                                        <p class="font-14 mb-0" aria-readonly="true">
                                            {{$product->description}}
                                        </p>
                                    </div>
                                    <div class="tab-pane p-3" id="ulasan" role="tabpanel">
                                        <p class="font-14 mb-0">
                                            Etsy mixtape wayfarers, ethical wes anderson tofu before they
                                            sold out mcsweeney's organic lomo retro fanny pack lo-fi
                                            farm-to-table readymade. Messenger bag gentrify pitchfork
                                            tattooed craft beer, iphone skateboard locavore carles etsy
                                            salvia banksy hoodie helvetica. DIY synth PBR banksy irony.
                                            Leggings gentrify squid 8-bit cred pitchfork. Williamsburg banh
                                            mi whatever gluten-free, carles pitchfork biodiesel fixie etsy
                                            retro mlkshk vice blog. Scenester cred you probably haven't
                                            heard of them, vinyl craft beer blog stumptown. Pitchfork
                                            sustainable tofu synth chambray yr.
                                        </p>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
    </div>
    
@endsection