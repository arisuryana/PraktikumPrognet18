<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from thememakker.com/templates/infinio/laravel/public/authentication/register by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 11 Mar 2019 06:54:00 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="csrf-token" content="Tbp5qyHVKfwB19ogdudrTuMIIn2Jdia62J6gzPOr">
    <link rel="icon" href="/assets_front/images/favicon.ico" type="image/x-icon"> <!-- Favicon-->
    <title>Register - Infinio Laravel</title>
    <meta name="description" content="Infinio Laravel">
    <meta name="author" content="Infinio Laravel">
    
    
    <link rel="stylesheet" href="/assets_front/plugins/bootstrap/css/bootstrap.min.css">

        
        
    <!-- Custom Css -->
    <link rel="stylesheet" href="/assets_front/css/main.css">
    <link rel="stylesheet" href="/assets_front/css/color_skins.css">
</head>

    
<body class="theme-purple">
    
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="m-t-30"><img class="zmdi-hc-spin" src="/assets_front/images/logo2.svg" width="48" height="48" alt=""></div>
            <p>Please wait...</p>        
        </div>
    </div>
    
    <div class="authentication">
        <div class="container">
            <div class="col-md-12 content-center">
    <div class="row clearfix">
        <div class="col-lg-6 col-md-12">
            <div class="company_detail">
                <a class="navbar-brand" href="index.html"><img src="/assets_front/images/logo.svg" width="200" alt="InfiniO"><span class="m-l-10"></span></a>
                <h4 class="logo"></h4>
                <div class="footer">
                    <ul  class="social_link list-unstyled">
                        <li><a href="#" title="ThemeMakker"><i class="zmdi zmdi-globe"></i></a></li>
                        <li><a href="#" title="Themeforest"><i class="zmdi zmdi-shield-check"></i></a></li>
                        <li><a href="#" title="LinkedIn"><i class="zmdi zmdi-linkedin"></i></a></li>
                        <li><a href="#" title="Facebook"><i class="zmdi zmdi-facebook"></i></a></li>
                        <li><a href="#" title="Twitter"><i class="zmdi zmdi-twitter"></i></a></li>
                        <li><a href="#" title="Google plus"><i class="zmdi zmdi-google-plus"></i></a></li>
                        <li><a href="#" title="Behance"><i class="zmdi zmdi-behance"></i></a></li>
                    </ul>
                    <hr>
                    <ul class="list-unstyled">
                        <li><a href="#" target="_blank">Contact Us</a></li>
                        <li><a href="#" target="_blank">About Us</a></li>
                        <li><a href="#" target="_blank">Services</a></li>
                        <li><a href="javascript:void(0);">FAQ</a></li>
                    </ul>
                </div>
            </div>
        </div>                        
        <div class="col-lg-5 col-md-12 offset-lg-1">
            <div class="card-plain">
                <div class="header">
                    <h5>Sign Up</h5>
                    <span>Register a new membership</span>
                </div>
                <form class="form" action="{{ route('register') }}" method="POST">
                    @csrf
                    <input type="text" name="profile_image" value="NULL" hidden="">
                    <input type="text" name="status" value="NULL" hidden="">

                    <div class="input-group">
                        <input type="text" id="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="Enter User Name" name="name" value="{{ old('name') }}" required autofocus>
                        <span class="input-group-addon"><i class="zmdi zmdi-account-circle"></i></span>
                        @if ($errors->has('name'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="input-group">
                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="Enter Email" name="email" value="{{ old('email') }}" required>
                        <span class="input-group-addon"><i class="zmdi zmdi-email"></i></span>

                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="input-group">
                        <input id="password" type="password" placeholder="Password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required/>
                        <span class="input-group-addon"><i class="zmdi zmdi-lock"></i></span>

                        @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="input-group">
                        <input id="password-confirm" type="password" placeholder="Confirm Password" class="form-control" name="password_confirmation" required/>
                        <span class="input-group-addon"><i class="zmdi zmdi-lock"></i></span>
                    </div>

                    <button type="submit" class="btn btn-primary btn-round btn-block">SIGN UP</button>                            
                </form>
                <a class="link" href="/login">You already have a membership ?</a>
            </div>
        </div>
    </div>
</div>
        </div>
        <div id="particles-js"></div>
    </div>

    <!-- Scripts -->
    
    <script src="/assets_front/bundles/libscripts.bundle.js"></script>
    <script src="/assets_front/bundles/vendorscripts.bundle.js"></script>

    <script src="/assets_front/plugins/particles-js/particles.min.js"></script>
    <script src="/assets_front/bundles/mainscripts.bundle.js"></script>

    <script src="/assets_front/plugins/particles-js/particles.js"></script>
        
</body>

<!-- Mirrored from thememakker.com/templates/infinio/laravel/public/authentication/register by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 11 Mar 2019 06:54:00 GMT -->
</html>
