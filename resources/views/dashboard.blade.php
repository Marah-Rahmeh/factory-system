@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="row align-items-center my-4">
                <div class="col">
                    <h2 class="h3 mb-0 page-title">{{ __('Dashboard') }}</h2>
                </div>
            </div>
            <div class="count1">
            <div class = "row">
                <div class = "col - xl - 3 col - md - 6 mb - 4 ">
                    <div class = "card border - left - primary shadow h - 100 py - 2"  >
                        <div class="count">
                        <div class = "card - body">
                            <div class = "row no - gutters align - items - center">
                                <div class = "col mr - 2">

                                    <div class = "text2 - xs font - weight -  bold text - primary text - uppercase mb - 1 ">
                                        Earnings(Monthly)
                                    </div>
                                            <div class =" text2 h5 mb - 0 font - weight - bold text - gray - 800 ">
                                                $ 40,000
                                            </div>
                                </div >
                                        <div class = "col - auto">
                                            <i class = "fas fa - calendar fa - 2x text - gray - 300"> </i>
                                        </div>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>


                <div class = "col - xl - 3 col - md - 6 mb - 4">
                    <div class = "card border - left - primary shadow h - 100 py - 2"  >
                        <div class="count">
                        <div class = "card - body">
                            <div class = "row no - gutters align - items - center">
                                <div class = "col mr - 2">

                                    <div class = "text2 - xs font - weight -  bold text - primary text - uppercase mb - 1 ">
                                        Earnings(Annual)
                                    </div>
                                            <div class ="text2 h5 mb - 0 font - weight - bold text - gray - 800 ">
                                                $ 40,000
                                            </div>
                                </div >
                                        <div class = "col - auto">
                                            <i class = "fas fa - calendar fa - 2x text - gray - 300"> </i>
                                        </div>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>


                <div class = "col - xl - 3 col - md - 6 mb - 4">
                    <div class = "card border - left - primary shadow h - 100 py - 2"  >
                        <div class="count">
                        <div class = "card - body">
                            <div class = "row no - gutters align - items - center">
                                <div class = "col mr - 2">

                                    <div class = "text2 - xs font - weight -  bold text - primary text - uppercase mb - 1 ">
                                        Contracts
                                    </div>
                                            <div class ="text2 h5 mb - 0 font - weight - bold text - gray - 800 ">
                                                $ 40,000
                                            </div>
                                </div >
                                        <div class = "col - auto">
                                            <i class = "fas fa - calendar fa - 2x text - gray - 300"> </i>
                                        </div>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>



                <div class = "col - xl - 3 col - md - 6 mb - 4">
                    <div class = "card border - left - primary shadow h - 100 py - 2"  >
                        <div class="count">
                        <div class = "card - body">
                            <div class = "row no - gutters align - items - center">
                                <div class = "col mr - 2">

                                    <div class = "text2 - xs font - weight -  bold text - primary text - uppercase mb - 1 ">
                                        Projects
                                    </div>
                                            <div class ="text2 h5 mb - 0 font - weight - bold text - gray - 800 ">
                                                $ 40,000
                                            </div>
                                </div >
                                        <div class = "col - auto">
                                            <i class = "fas fa - calendar fa - 2x text - gray - 300"> </i>
                                        </div>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
            </div>


            <div class="ph">
            <div class="row">
                <div class="col-md-6 style="background-color:lavender;"">
                    <div class="chart-container">
                        <div class="pie-chart-container">
                        <canvas id="pie-chart"></canvas>
                        </div>
                    </div>
                </div>

                {{-- <div class="col-sm-6" style="background-color:lavender;">
                    <div class="isResizable chart-container">
                        <div class="pie-chart-container">
                            <canvas id="pie-chart"></canvas>
                      </div>
                    </div> --}}

                <div class="col-md-6" style="background-color:lavender;">
                    <div class="graphCanvas-container" >
                        <canvas  id="graphCanvas"></canvas>
                    </div>
                </div>
            </div>
<hr>
            <div class="col-sm-6" style="background-color:lavender;">
                <div class="isResizable chart-container">
                    <div class="doughnut-container">
                        <canvas id="doughnut"></canvas>
                </div>
                </div>
            </div>

        </div>
    </div>
</div>
    </div>

<script>

    $(function(){
        //get the pie chart canvas
        var cData = JSON.parse(`<?php echo $chart_data; ?>`);
        var ctx = $("#pie-chart");

        //pie chart data
        var data = {
          labels: cData.label,
          datasets: [
            {
              label: "Users Count",
              data: cData.data,
              backgroundColor: [
                "#DEB887",
                "#A9A9A9",
                "#DC143C",
                "#F4A460",
                "#2E8B57",
                "#1D7A46",
                "#CDA776",
              ],
              borderColor: [
                "#CDA776",
                "#989898",
                "#CB252B",
                "#E39371",
                "#1D7A46",
                "#F4A460",
                "#CDA776",
              ],
              borderWidth: [1, 1, 1, 1, 1,1,1]
            }
          ]
        };

        //options
        var options = {
          responsive: true,
          title: {
            display: true,
            position: "top",
            text: "Last Week Registered Users -  Day Wise Count",
            fontSize: 18,
            fontColor: "#111"
          },
          legend: {
            display: true,
            position: "bottom",
            labels: {
              fontColor: "#333",
              fontSize: 16
            }
          }
        };

        //create Pie Chart class object
        var chart1 = new Chart(ctx, {
          type: "pie",
          data: data,
          options: options
        });

    });

    /////////////////////////
    var cData2 = JSON.parse(`<?php echo $chart_data2; ?>`);
        var ctx2 = $("#graphCanvas");

  var myChart = new Chart(ctx2, {
    type: 'bar',
    data: {
        labels: cData2.label,
        datasets: [{
            label: 'Proposal chart',
            data: cData2.data,
            backgroundColor: ['rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});

//////////////////////////////////

// function getChartColorsArray(chartId) {
//     if (document.getElementById(chartId) !== null) {
//         var colors = document.getElementById(chartId).getAttribute("data-colors");
//         colors = JSON.parse(colors);
//         return colors.map(function (value) {
//             var newValue = value.replace(" ", "");
//             if (newValue.indexOf(",") === -1) {
//                 var color = getComputedStyle(document.documentElement).getPropertyValue(newValue);
//                 if (color) return color; else return newValue;;
//             } else {
//                 var val = value.split(',');
//                 if(val.length == 2){
//                     var rgbaColor = getComputedStyle(document.documentElement).getPropertyValue(val[0]);
//                     rgbaColor = "rgba("+rgbaColor+","+val[1]+")";
//                     return rgbaColor;
//                 } else {
//                     return newValue;
//                 }
//             }
//         });
//     }
// };

// Chart.defaults.borderColor= "rgba(133, 141, 152, 0.1)";
// Chart.defaults.color= "#858d98";


// var cData3 = JSON.parse(`<?php echo $chart_data2; ?>`);
// var ctx2 = $("#doughnut");

// // var isdoughnutchart = document.getElementById('doughnut');
//  doughnutChartColors =  getChartColorsArray('doughnut');
// var lineChart = new Chart(ctx3, {
//     type: 'doughnut',
//     data: {
//         labels: cData3.label,
//         datasets: [
//             {
//                 data: cData3.data,
//                 backgroundColor: doughnutChartColors,
//                 hoverBackgroundColor: doughnutChartColors,
//                 hoverBorderColor: "#fff"
//             }]
//     },
//     options: {
//         plugins: {
//             legend: {
//                 labels: {
//                     font: {
//                         family: 'Poppins',
//                     }
//                 }
//             },
//         }
//     }
// });
  </script>

@endsection
