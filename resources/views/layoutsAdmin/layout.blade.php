<!DOCTYPE html>
<html>

<head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title>Admin Ecommerce</title>
        <meta content="Admin Dashboard" name="description" />
        <meta content="Mannatthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <link rel="shortcut icon" href="/assets_back/images/favicon.ico">

        <link href="/assets_back/plugins/morris/morris.css" rel="stylesheet">

        <link href="/assets_back/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="/assets_back/css/icons.css" rel="stylesheet" type="text/css">
        <link href="/assets_back/css/style.css" rel="stylesheet" type="text/css">

        <link href="/assets_back/plugins/timepicker/tempusdominus-bootstrap-4.css" rel="stylesheet" />
        <link href="/assets_back/plugins/timepicker/bootstrap-material-datetimepicker.css" rel="stylesheet">
        <link href="/assets_back/plugins/clockpicker/jquery-clockpicker.min.css" rel="stylesheet" />
        <link href="/assets_back/plugins/colorpicker/asColorPicker.min.css" rel="stylesheet" type="text/css" />
        <link href="/assets_back/plugins/select2/select2.min.css" rel="stylesheet" type="text/css" />

        <link href="/assets_back/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css" rel="stylesheet">
        <link href="/assets_back/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">
        <link href="/assets_back/plugins/bootstrap-touchspin/css/jquery.bootstrap-touchspin.min.css" rel="stylesheet" />

        <!-- DataTables -->
        <link href="/assets_back/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link href="/assets_back/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <!-- Responsive datatable examples -->
        <link href="/assets_back/plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />

        <link href="/assets_back/plugins/dropzone/dist/dropzone.css" rel="stylesheet" type="text/css" />
        <link href="/assets_back/plugins/dropify/css/dropify.min.css" rel="stylesheet" />
    </head>


    <body class="fixed-left">

        {{-- <!-- Loader -->
        <div id="preloader"><div id="status"><div class="spinner"></div></div></div> --}}

        <!-- Begin page -->
        <div id="wrapper">

            @include('layoutsAdmin.sidebar')

            <!-- Start right Content here -->

            <div class="content-page">
                <!-- Start content -->
                <div class="content">

                    @include('layoutsAdmin.header')

                    <div class="page-content-wrapper ">

                        <div class="container-fluid">
                            

                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif

                            @yield('contentAdmin')
                                                                                 
                        </div><!-- container -->


                    </div> <!-- Page content Wrapper -->

                </div> <!-- content -->

                @include('layoutsAdmin.footer')

            </div>
            <!-- End Right content here -->

        </div>
        <!-- END wrapper -->


        <!-- jQuery  -->
        <script src="/assets_back/js/jquery.min.js"></script>
        <script src="/assets_back/js/popper.min.js"></script>
        <script src="/assets_back/js/bootstrap.min.js"></script>
        <script src="/assets_back/js/modernizr.min.js"></script>
        <script src="/assets_back/js/detect.js"></script>
        <script src="/assets_back/js/fastclick.js"></script>
        <script src="/assets_back/js/jquery.slimscroll.js"></script>
        <script src="/assets_back/js/jquery.blockUI.js"></script>
        <script src="/assets_back/js/waves.js"></script>
        <script src="/assets_back/js/jquery.nicescroll.js"></script>
        <script src="/assets_back/js/jquery.scrollTo.min.js"></script>

        <script src="/assets_back/plugins/skycons/skycons.min.js"></script>
        <script src="/assets_back/plugins/raphael/raphael-min.js"></script>
        

        <!-- App js -->
        <script src="/assets_back/js/app.js"></script>

        <!-- Required datatable js -->
        <script src="/assets_back/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="/assets_back/plugins/datatables/dataTables.bootstrap4.min.js"></script>
        <!-- Buttons examples -->
        <script src="/assets_back/plugins/datatables/dataTables.buttons.min.js"></script>
        <script src="/assets_back/plugins/datatables/buttons.bootstrap4.min.js"></script>
        <script src="/assets_back/plugins/datatables/jszip.min.js"></script>
        <script src="/assets_back/plugins/datatables/pdfmake.min.js"></script>
        <script src="/assets_back/plugins/datatables/vfs_fonts.js"></script>
        <script src="/assets_back/plugins/datatables/buttons.html5.min.js"></script>
        <script src="/assets_back/plugins/datatables/buttons.print.min.js"></script>
        <script src="/assets_back/plugins/datatables/buttons.colVis.min.js"></script>
        <!-- Responsive examples -->
        <script src="/assets_back/plugins/datatables/dataTables.responsive.min.js"></script>
        <script src="/assets_back/plugins/datatables/responsive.bootstrap4.min.js"></script>

        <!-- Datatable init js -->
        <script src="/assets_back/pages/datatables.init.js"></script>
        <script src="/assets_back/plugins/tiny-editable/mindmup-editabletable.js"></script>
        <script src="/assets_back/plugins/tiny-editable/numeric-input-example.js"></script>
        <script src="/assets_back/plugins/tabledit/jquery.tabledit.js"></script>

       <!-- Datatable js -->
       <script type="text/javascript">
           $(document).ready(function() {
               $('#datatable2').DataTable();  
           } );
       </script>

        <script src="/assets_back/plugins/timepicker/moment.js"></script>
        <script src="/assets_back/plugins/timepicker/tempusdominus-bootstrap-4.js"></script>
        <script src="/assets_back/plugins/timepicker/bootstrap-material-datetimepicker.js"></script>
        <script src="/assets_back/plugins/clockpicker/jquery-clockpicker.min.js"></script>
        <script src="/assets_back/plugins/colorpicker/jquery-asColor.js" type="text/javascript"></script>
        <script src="/assets_back/plugins/colorpicker/jquery-asGradient.js" type="text/javascript"></script>
        <script src="/assets_back/plugins/colorpicker/jquery-asColorPicker.min.js" type="text/javascript"></script>
        <script src="/assets_back/plugins/select2/select2.min.js" type="text/javascript"></script>
        
        <script src="/assets_back/plugins/morris/morris.min.js"></script>
        <script src="/assets_back/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
        <script src="/assets_back/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
        <script src="/assets_back/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js" type="text/javascript"></script>
        <script src="/assets_back/plugins/bootstrap-touchspin/js/jquery.bootstrap-touchspin.min.js" type="text/javascript"></script>
        <script src="/assets_back/pages/dashborad.js" type="text/javascript"></script>

        <!-- Plugins Init js -->
        <script src="/assets_back/pages/form-advanced.js"></script>
        
        <script src="/assets_back/plugins/dropzone/dist/dropzone.js"></script>
        <script src="/assets_back/plugins/dropify/js/dropify.min.js"></script>
        <script>
                $(document).ready(function(){
                    // Basic
                    $('.dropify').dropify();
    
                    // Translated
                    $('.dropify-fr').dropify({
                        messages: {
                            default: 'Glissez-déposez un fichier ici ou cliquez',
                            replace: 'Glissez-déposez un fichier ou cliquez pour remplacer',
                            remove:  'Supprimer',
                            error:   'Désolé, le fichier trop volumineux'
                        }
                    });
    
                    // Used events
                    var drEvent = $('#input-file-events').dropify();
    
                    drEvent.on('dropify.beforeClear', function(event, element){
                        return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
                    });
    
                    drEvent.on('dropify.afterClear', function(event, element){
                        alert('File deleted');
                    });
    
                    drEvent.on('dropify.errors', function(event, element){
                        console.log('Has Errors');
                    });
    
                    var drDestroy = $('#input-file-to-destroy').dropify();
                    drDestroy = drDestroy.data('dropify')
                    $('#toggleDropify').on('click', function(e){
                        e.preventDefault();
                        if (drDestroy.isDropified()) {
                            drDestroy.destroy();
                        } else {
                            drDestroy.init();
                        }
                    })
                });
            </script>

    </body>
</html>