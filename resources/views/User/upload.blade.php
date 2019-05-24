@extends('layoutsUser.layout')
@section('invoice','active open')
@section('contentUser')
    <div class="row clearfix">
        <div class="col-lg-12">
            <div class="card">
                <div class="body">
                    <div class="block-header">
                        <div class="row">
                            <div class="col-lg-6 col-md-8 col-sm-12">
                                <h2>Index</h2>
                                <ul class="breadcrumb p-l-0 p-b-0 ">
                                    <li class="breadcrumb-item"><a href="index.html"><i class="icon-home"></i></a></li>
                                    <li class="breadcrumb-item">Profile</li>                                                                                                                      
                                </ul>
                            </div>
                        </div>               
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card">
                <div class="header">
                    <h2><strong>Upload Bukti Pembayaran</strong></h2>
                </div>
                <div class="body">
                    <form action="/upload/{{$id}}" id="my-dropzone" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method("PUT")
                        
                        <div class="dz-message">
                            <div class="drag-icon-cph"> <i class="material-icons">touch_app</i> </div>
                            
                        <div class="row clearfix">
                            <input name="bukti" required type="file" id="single-bukti" accept="image/*" multiple/>
                        </div>
                        <div class="row clearfix">
                            <a href="/invoice"><button type="button" class="btn btn-default pull-left" data-dismiss="modal">Back</button></a>
                            <button type="submit" name="submit" class="btn btn-primary">Save Changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    
@endsection
