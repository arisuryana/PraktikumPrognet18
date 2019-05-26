@extends('layoutsAdmin.layout')

@section('contentAdmin')
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="btn-group float-right">
                    <ol class="breadcrumb hide-phone p-0 m-0">
                        <li class="breadcrumb-item"><a href="#">Admin</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
                <h4 class="page-title">Dashboard</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card m-b-30">
                <div class="card-body">
                    <h4 class="mt-0 header-title">Admin Dashboard</h4>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
            <div class="row-fluid">
                <div class="span3"></div>
                <div class="span6">
                    <div>
                        <canvas id="canvas"></canvas>
                    </div>       
                </div>
                <div class="span3"></div>                 
            </div>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        {{--     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.3/js/bootstrap-select.min.js" charset="utf-8"></script> --}}
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.js" charset="utf-8"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0/dist/Chart.min.js"></script>
        
        <script type="text/javascript">
            // This function is called from the pop-up menus to transfer to
            // a different page. Ignore if the value returned is a null string:
            function goPage (newURL) {
                // if url is empty, skip the menu dividers and reset the menu selection to default
                if (newURL != "") {
                    // if url is "-", it is this page -- reset the menu:
                    if (newURL == "-" ) {
                        resetMenu();
                    }
                    // else, send page to designated URL
                    else {
                        document.location.href = newURL;
                    }
                }
            }
            // resets the menu selection upon entry to this page:
            function resetMenu() {
                document.gomenu.selector.selectedIndex = 2;
            }
        </script>
        <script>
            var url = "{{url('/chart')}}";
                var Pendapatan = new Array();
                var Labels = new Array();
                var Bulan = new Array();
                $(document).ready(function(){
                  $.get(url, function(response){
                    response.forEach(function(data){
                        Pendapatan.push(data.pendapatan);
                        Labels.push(data.pendapatan);                    
                        Bulan.push(data.bulan);
                    });
                    var ctx = document.getElementById("canvas").getContext('2d');
                        var myChart = new Chart(ctx, {
                          type: 'bar',
                          data: {
                              labels:Bulan,
                              datasets: [{
                                  label: 'Pendapatan',
                                  data: Pendapatan,
                                  borderWidth: 1
                              }]
                          },
                          options: {
                              scales: {
                                  yAxes: [{
                                      ticks: {
                                          beginAtZero:true
                                      }
                                  }]
                              }
                          }
                      });
                  });
                });
    </script>
@endsection
