@extends('superuser.layouts.superuserAppad')



@section('content')
<div class="row ml-5">
    <div class="card mr-5 border-0 bg-success" style="width: 20rem;">
            <div class="card-body align-items-center justify-content-center">
                <div class="d-flex justify-content-center">
                    <h2 class="font-weight-bold text-warning">{{ $ad }}</h2>
                </div>
                <div class="d-flex justify-content-center">
                    <h5 class="text-dark">Total Advertisments</h5>
                </div>
            </div>
        </div>
        
        <div class="card mr-5 border-0 bg-primary" style="width: 20rem;">
            <div class="card-body align-items-center justify-content-center">
                <div class="d-flex justify-content-center">
                    <h2 class="font-weight-bold text-white">{{ $ca }}</h2>
                </div>
                <div class="d-flex justify-content-center">
                    <h5 class="text-dark">Total categories</h5>
                </div>
            </div>
        </div>

        <div class="card mr-5 border-0 bg-warning" style="width: 20rem;">
            <div class="card-body align-items-center justify-content-center">
                <div class="d-flex justify-content-center">
                    <h2 class="font-weight-bold text-primary">{{ $ue }}</h2>
                </div>
                <div class="d-flex justify-content-center">
                    <h5 class="text-dark">Total users</h5>
                </div>
            </div>
        </div>
        </div>



  <script type="text/javascript">
   var analytics = <?php echo $category; ?>

   google.charts.load('current', {'packages':['corechart']});

   google.charts.setOnLoadCallback(drawChart);

   function drawChart()
   {
    var data = google.visualization.arrayToDataTable(analytics);
    var options = {
     title : 'Percentage of advertisers categories'
    };
    var chart = new google.visualization.PieChart(document.getElementById('pie_chart'));
    chart.draw(data, options);
   }
  </script>
  <br><br>

  <div class="container">
  
   
   <div class="panel panel-default">
    <div class="panel-heading">
    
    </div>
    <div class="panel-body" align="center">
     <div id="pie_chart" style="width:750px; height:450px;">

     </div>
    </div>
   </div>
   
  </div>
  @endsection

     
   