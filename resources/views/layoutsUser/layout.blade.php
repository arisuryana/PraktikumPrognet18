<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from thememakker.com/templates/infinio/laravel/public/dashboard/index by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 11 Mar 2019 06:44:50 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    {{-- <meta name="csrf-token" content="Tbp5qyHVKfwB19ogdudrTuMIIn2Jdia62J6gzPOr"> --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="/assets_front/images/favicon.ico" type="image/x-icon"> <!-- Favicon-->
    <title>Ashiap Store</title>
    <meta name="description" content="Infinio Laravel">
    <meta name="author" content="Infinio Laravel">
    
    
    <link rel="stylesheet" href="/assets_front/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets_front/plugins/morrisjs/morris.min.css">
    <link rel="stylesheet" href="/assets_front/css/ecommerce.css">
    <link rel="stylesheet" href="/assets_front/plugins/sweetalert/sweetalert.css">
    <link rel="stylesheet" href="/assets_front/plugins/bootstrap-select/css/bootstrap-select.css">
    <link rel="stylesheet" href="/assets_front/plugins/multi-select/css/multi-select.css">
    <link rel="stylesheet" href="/assets_front/plugins/jquery-datatable/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="/assets_front/plugins/dropzone/dropzone.css">
        
    <!-- Custom Css -->
    <link rel="stylesheet" href="/assets_front/css/main.css">
    <link rel="stylesheet" href="/assets_front/css/color_skins.css">
</head>


<body class="theme-purple">
<!-- Page Loader -->
<div class="page-loader-wrapper">
    <div class="loader">
        <div class="m-t-30"><img class="zmdi-hc-spin" src="/assets_front/images/logo2.svg" width="48" height="48" alt="InfiniO"></div>
        <p>Please wait...</p>        
    </div>
</div>
<!-- Overlay For Sidebars -->
<div class="overlay"></div>

<!-- Top Bar -->
<nav class="top_navbar">
    <div class="container">
        <div class="row clearfix">
            <div class="col-12">
                <div class="navbar-logo">
                    <a href="javascript:void(0);" class="bars"></a>
                    <a class="navbar-brand" href="index.html"><img src="/assets_front/images/logo.svg" width="200" alt="InfiniO"><span class="m-l-10"></span></a>
                </div>
                @include('layoutsUser.header')
            </div>
        </div>        
    </div>
</nav><!-- Main Left sidebar menu -->
<aside id="leftsidebar" class="sidebar h_menu">
    <div class="container">
        <div class="row clearfix">
            <div class="col-12">
                <div class="menu">

                    @include('layoutsUser.topbar')
                
                </div>
            </div>
        </div>
    </div>
</aside><!-- Right Sidebar setting menu -->
<section class="content">
    <div class="container">
        

        @yield('contentUser')

    </div>
               
    @include('layoutsUser.footer')

</section>


<!-- Scripts -->
<script src="/assets_front/bundles/libscripts.bundle.js"></script>    
<script src="/assets_front/bundles/vendorscripts.bundle.js"></script>
<script src="/assets_front/plugins/jquery-inputmask/jquery.inputmask.bundle.js"></script>
<script src="/assets_front/plugins/multi-select/js/jquery.multi-select.js"></script>

<script src="/assets_front/plugins/momentjs/moment.js"></script>
<script src="/assets_front/bundles/morrisscripts.bundle.js"></script>
<script src="/assets_front/bundles/jvectormap.bundle.js"></script>
<script src="/assets_front/bundles/knob.bundle.js"></script>
<script src="/assets_front/plugins/sweetalert/sweetalert.min.js"></script>
<script src="/assets_front/js/pages/forms/basic-form-elements.js"></script>
<script src="/assets_front/js/pages/forms/advanced-form-elements.js"></script>
<script src="/assets_front/bundles/datatablescripts.bundle.js"></script>
<script src="/assets_front/js/pages/tables/jquery-datatable.js"></script>
<script src="/assets_front/plugins/jquery-datatable/buttons/dataTables.buttons.min.js"></script>
<script src="/assets_front/plugins/jquery-datatable/buttons/buttons.bootstrap4.min.js"></script>
<script src="/assets_front/plugins/dropzone/dropzone.js"></script>


<script src="/assets_front/bundles/mainscripts.bundle.js"></script>
<script src="/assets_front/js/pages/index.js"></script>
<script src="/assets_front/js/pages/widgets/infobox/infobox-1.js"></script>
<script src="/assets_front/plugins/jquery/jquery.min.js"></script>

<script>
    function formatRupiah(angka, prefix){
    var number_string = angka.toString().replace(/[^,\d]/g, ''),
    split   		= number_string.split(','),
    sisa     		= split[0].length % 3,
    rupiah     		= split[0].substr(0, sisa),
    ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);

    // tambahkan titik jika yang di input sudah menjadi angka ribuan
    if(ribuan){
        separator = sisa ? '.' : '';
        rupiah += separator + ribuan.join('.');
    }

    rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
    return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
    }
</script>

@yield('contentJquery')
</body>

<!-- Mirrored from thememakker.com/templates/infinio/laravel/public/dashboard/index by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 11 Mar 2019 06:46:53 GMT -->
</html>
