@extends('layoutsUser.layout')

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
        <div class="col-lg-12 col-md-12">
            <div class="card active-bg text-white">
                <div class="body profile-header">
                    <img src="/assets_front/images/profile_av.jpg" class="user_pic rounded img-raised" alt="User">
                    <div class="detail">
                        <div class="u_name">
                            <h4><strong>{{$name}}</strong></h4>
                            <span>{{$email}}</span>
                        </div>
                        <div id="m_area_chart"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection
