<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Safi Dental Clinic - MIS </title>
@include('links')
<!-- Start page Label Plugins
=====================================================================-->
    <!-- Toastr css -->
    <link href="{{asset('assets/plugins/toastr/toastr.css')}}" rel="stylesheet" type="text/css"/>
    <!-- Emojionearea -->
    <link href="{{asset('assets/plugins/emojionearea/emojionearea.min.css')}}" rel="stylesheet" type="text/css"/>
    <!-- Monthly css -->
    <link href="{{asset('assets/plugins/monthly/monthly.css')}}" rel="stylesheet" type="text/css"/>
    <!-- End page Label Plugins
    =====================================================================-->
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

    @include('header')
    <!-- =============================================== -->
    <!-- Left side column. contains the sidebar -->
@include('aside')
    <!-- =============================================== -->
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="header-icon">
                <i class="fa fa-tachometer"></i>
            </div>
            <div class="header-title">
                <h1> Dashboard</h1>
                <small> Admin Dashboard</small>
                <ol class="breadcrumb hidden-xs">
                    <li><a href="{{url('/')}}"><i class="pe-7s-home"></i> Home</a></li>
                    <li class="active">Dashboard</li>
                </ol>
            </div>
        </section>
        @if(session()->has('message'))

            <div class="alert alert-warning alert-dismissible" id="success-alert">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                {{ session()->get('message') }}
            </div>
    @endif
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-3">
                    <div class="panel panel-bd cardbox">
                        <div class="panel-body">
                            <div class="statistic-box">
                                <h2><span class="count-number">{{$staffs_count}}</span>
                                </h2>
                            </div>
                            <div class="items pull-left">
                                <i class="fa fa-users fa-2x"></i>
                                <h4>Total Staffs
                                </h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-3">
                    <div class="panel panel-bd cardbox">
                        <div class="panel-body">
                            <div class="statistic-box">
                                <h2><span class="count-number">{{$today_patients_count}}</span>
                                </h2>
                            </div>
                            <div class="items pull-left">
                                <i class="fa fa-users fa-2x"></i>
                                <h4>Today's Patients</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-3">
                    <div class="panel panel-bd cardbox">
                        <div class="panel-body">
                            <div class="statistic-box">
                                <h2><span class="count-number">{{$t_appointments_count}}</span>
                                </h2>
                            </div>
                            <div class="items pull-left">
                                <i class="fa fa-user-circle fa-2x"></i>
                                <h4>Today Appointments</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-3">
                    <div class="panel panel-bd cardbox">
                        <div class="panel-body">
                            <div class="statistic-box">
                                <h2><span class="count-number">{{$t_appointments_count + $today_patients_count}}</span>
                                </h2>
                            </div>
                            <div class="items pull-left">
                                <i class="fa fa-users fa-2x"></i>
                                <h4>Total Visits</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-3">
                    <div class="panel panel-bd cardbox">
                        <div class="panel-body">
                            <div class="statistic-box">
                                <h2><span class="count-number">{{$patients_loan_amount}}</span>
                                </h2>
                            </div>
                            <div class="items pull-left">
                                <i class="fa fa-user-circle fa-2x"></i>
                                <h4>Total Patients Loan</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-3">
                    <div class="panel panel-bd cardbox">
                        <div class="panel-body">
                            <div class="statistic-box">
                                <h2><span class="count-number">{{$lab_loan_amount}}</span>
                                </h2>
                            </div>
                            <div class="items pull-left">
                                <i class="fa fa-users fa-2x"></i>
                                <h4>Total Labs Loan</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-3">
                    <div class="panel panel-bd cardbox">
                        <div class="panel-body">
                            <div class="statistic-box">
                                <h2><span class="count-number">{{$patients_count}}</span>
                                </h2>
                            </div>
                            <div class="items pull-left">
                                <i class="fa fa-users fa-2x"></i>
                                <h4>Total Patients</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-3">
                    <div class="panel panel-bd cardbox">
                        <div class="panel-body">
                            <div class="statistic-box">
                                <h2><span class="count-number">{{$orders_count}}</span>
                                </h2>
                            </div>
                            <div class="items pull-left">
                                <i class="fa fa-users fa-2x"></i>
                                <h4>Total Orders</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- datamap -->
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8 ">
                    <div class="panel panel-bd lobidrag">
                        <div class="panel-heading">
                            <div class="panel-title">
                                <h4>Line chart</h4>
                            </div>
                        </div>
                        <div class="panel-body">
                            <canvas id="lineChart" height="150"></canvas>
                        </div>
                    </div>
                </div>
                <!-- calender -->
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
                    <div class="panel panel-bd lobidisable">
                        <div class="panel-heading">
                            <div class="panel-title">
                                <h4>Calender</h4>
                            </div>
                        </div>
                        <div class="panel-body">
                            <!-- monthly calender -->
                            <div class="monthly_calender">
                                <div class="monthly" id="m_calendar"></div>
                            </div>
                        </div>
                        <div id="map1" class="hidden-xs hidden-sm hidden-md hidden-lg"></div>
                    </div>
                </div>
                <!-- Bar Chart -->
                <div class="col-xs-12 col-sm-12 col-md-6" style="display: none;">
                    <div class="panel panel-bd lobidisable">
                        <div class="panel-heading">
                            <div class="panel-title">
                                <h4>Bar chart</h4>
                            </div>
                        </div>
                        <div class="panel-body">
                            <canvas id="barChart" height="200"></canvas>
                        </div>
                    </div>
                </div>
                <!-- Radar Chart -->
                <div class="col-xs-12 col-sm-12 col-md-6" style="display: none;">
                    <div class="panel panel-bd lobidisable">
                        <div class="panel-heading">
                            <div class="panel-title">
                                <h4>Rader chart</h4>
                            </div>
                        </div>
                        <div class="panel-body">
                            <canvas id="radarChart" height="200"></canvas>
                        </div>
                    </div>
                </div>

            </div> <!-- /.row -->
        </section> <!-- /.content -->

    </div> <!-- /.content-wrapper -->
   @include('footer')
</div> <!-- ./wrapper -->
<!-- ./wrapper -->
@include('scripts')

<!-- End Theme label Script
=====================================================================-->
<script>
    "use strict"; // Start of use strict
    // notification
    setTimeout(function () {
        toastr.options = {
            closeButton: true,
            progressBar: true,
            showMethod: 'slideDown',
            timeOut: 2000
        };
        toastr.success('Managemnt Information System', 'Welcome to Safi Dental Clinic ');

    }, 1300);

    //counter
    $('.count-number').counterUp({
        delay: 10,
        time: 5000,
    });

    //data maps
    var basic_choropleth = new Datamap({
        element: document.getElementById("map1"),
        projection: 'mercator',
        fills: {
            defaultFill: "#009688",
            authorHasTraveledTo: "#fa0fa0"
        },
        data: {
            USA: {fillKey: "authorHasTraveledTo"},
            JPN: {fillKey: "authorHasTraveledTo"},
            ITA: {fillKey: "authorHasTraveledTo"},
            CRI: {fillKey: "authorHasTraveledTo"},
            KOR: {fillKey: "authorHasTraveledTo"},
            DEU: {fillKey: "authorHasTraveledTo"}
        }
    });

    var colors = d3.scale.category10();

    window.setInterval(function () {
        basic_choropleth.updateChoropleth({
            USA: colors(Math.random() * 10),
            RUS: colors(Math.random() * 100),
            AUS: {fillKey: 'authorHasTraveledTo'},
            BRA: colors(Math.random() * 50),
            CAN: colors(Math.random() * 50),
            ZAF: colors(Math.random() * 50),
            IND: colors(Math.random() * 50)
        });
    }, 2000);

    //bar chart
    var ctx = document.getElementById("barChart");
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
            datasets: [
                {
                    label: "My First dataset",
                    data: [65, 59, 80, 81, 56, 55, 40, 25, 35, 51, 94, 16],
                    borderColor: "#009688",
                    borderWidth: "0",
                    backgroundColor: "#009688"
                },
                {
                    label: "My Second dataset",
                    data: [28, 48, 40, 19, 86, 27, 90, 91, 41, 25, 34, 47],
                    borderColor: "#009688",
                    borderWidth: "0",
                    backgroundColor: "#009688"
                }
            ]
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
    //radar chart
    var ctx = document.getElementById("radarChart");
    var myChart = new Chart(ctx, {
        type: 'radar',
        data: {
            labels: [["Eating", "Dinner"], ["Drinking", "Water"], "Sleeping", ["Designing", "Graphics"], "Coding", "Cycling", "Running"],
            datasets: [
                {
                    label: "My First dataset",
                    data: [65, 59, 66, 45, 56, 55, 40],
                    borderColor: "#00968866",
                    borderWidth: "1",
                    backgroundColor: "rgba(0, 150, 136, 0.35)"
                },
                {
                    label: "My Second dataset",
                    data: [28, 12, 40, 19, 63, 27, 87],
                    borderColor: "rgba(55, 160, 0, 0.7",
                    borderWidth: "1",
                    backgroundColor: "rgba(0, 150, 136, 0.35)"
                }
            ]
        },
        options: {
            legend: {
                position: 'top'
            },
            scale: {
                ticks: {
                    beginAtZero: true
                }
            }
        }
    });

    // Message
    $('.message_inner').slimScroll({
        size: '3px',
        height: '320px'
    });

    //emojionearea
    $(".emojionearea").emojioneArea({
        pickerPosition: "top",
        tonesStyle: "radio"
    });

    //monthly calender
    $('#m_calendar').monthly({
        mode: 'event',
        //jsonUrl: 'events.json',
        //dataType: 'json'
        xmlUrl: 'events.xml'
    });


    //line chart
    var ctx = document.getElementById("lineChart");
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
            datasets: [
                {
                    label: "My First dataset",
                    borderColor: "rgba(0,0,0,.09)",
                    borderWidth: "1",
                    backgroundColor: "rgba(0,0,0,.07)",
                    data: [22, 44, 67, 43, 76, 45, 12, 45, 65, 55, 42, 61, 73]
                },
                {
                    label: "My Second dataset",
                    borderColor: "#009688",
                    borderWidth: "1",
                    backgroundColor: "#009688",
                    pointHighlightStroke: "#009688",
                    data: [16, 32, 18, 26, 42, 33, 44, 24, 19, 16, 67, 71, 65]
                }
            ]
        },
        options: {
            responsive: true,
            tooltips: {
                mode: 'index',
                intersect: false
            },
            hover: {
                mode: 'nearest',
                intersect: true
            }

        }
    });


</script>
<script>
    $("#success-alert").fadeTo(2000, 500).slideUp(500, function(){
        $("#success-alert").slideUp(500);
    });
</script>

</body>
</html>
