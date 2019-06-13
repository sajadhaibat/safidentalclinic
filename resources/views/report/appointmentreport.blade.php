<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Appointment Report</title>

    <!-- Favicon and touch icons -->
    <link rel="shortcut icon" href="{{asset('favicon.png')}}" type="image/x-icon">

    <!-- Start Global Mandatory Style
    =====================================================================-->
    <!-- jquery-ui css -->
    <link href="{{asset('assets/plugins/jquery-ui-1.12.1/jquery-ui.min.css')}}" rel="stylesheet" type="text/css"/>
    <!-- Bootstrap -->
    <link href="{{asset('assets/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css"/>
    <!-- Bootstrap rtl -->
    <!--<link href="assets/bootstrap-rtl/bootstrap-rtl.min.css" rel="stylesheet" type="text/css"/>-->
    <!-- Lobipanel css -->
    <link href="{{asset('assets/plugins/lobipanel/lobipanel.min.css')}}" rel="stylesheet" type="text/css"/>
    <!-- Pace css -->
    <link href="{{asset('assets/plugins/pace/flash.css')}}" rel="stylesheet" type="text/css"/>
    <!-- Font Awesome -->
    <link href="{{asset('assets/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css"/>
    <!-- Pe-icon -->
    <link href="{{asset('assets/pe-icon-7-stroke/css/pe-icon-7-stroke.css')}}" rel="stylesheet" type="text/css"/>
    <!-- Themify icons -->
    <link href="{{asset('assets/themify-icons/themify-icons.css')}}" rel="stylesheet" type="text/css"/>
    <!-- End Global Mandatory Style
    =====================================================================-->
    <!-- Start Theme Layout Style
    =====================================================================-->
    <!-- Theme style -->
    <link href="{{asset('assets/dist/css/stylehealth.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css">
    <!-- Theme style rtl -->
    <!--<link href="assets/dist/css/stylehealth-rtl.css" rel="stylesheet" type="text/css"/>-->
    <!-- End Theme Layout Style
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
                <i class="fa fa-list"></i>
            </div>
            <div class="header-title">
                <h1>Report</h1>
                <small> Appointment Report</small>
                <ol class="breadcrumb hidden-xs">
                    <li><a href="{{url('/')}}"><i class="pe-7s-home"></i> Home</a></li>
                    <li class="active">Dashboard</li>
                </ol>
            </div>
        </section>


        <!--filter content-->
        <div class="filter-content">
            <div class="panel panel-bd lobidrag">
                <div class="panel-body">
                    <form class="form-inline" action="{{url('appointmentreport')}}" enctype="multipart/form-data" method="post">
                        <input type = "hidden" name = "_token" value = "<?php echo csrf_token() ?>" />
                        <div class="form-group">
                            <label class="sr-only" for="start_date">Start Date</label>
                            <input type="date" name="start_date" class="form-control datepicker hasDatepicker" id="start_date" placeholder="Start Date">
                        </div>

                        <div class="form-group">
                            <label class="sr-only" for="end_date">End Date</label>
                            <input type="date" name="end_date" class="form-control datepicker hasDatepicker" id="end_date" placeholder="End Date">
                        </div>

                        <button type="submit" class="btn btn-success">Filter</button>

                    </form>
                </div>
            </div>
        </div>

        <div class="alert alert-success alert-dismissible col-sm-8 col-sm-offset-2" id="success-alert">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            Total Appointments:
            <b>{{ $appointment_count }}</b>
        </div>
        <!-- Main content -->
        <section class="content">

            <div class="row">
                <div class="col-sm-12">
                    <div class="panel panel-bd lobidrag">
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table id="dataTable" class="table table-bordered table-hover">
                                    <thead class="success">
                                    <tr>
                                        <th>Name</th>
                                        <th>Mobile</th>
                                        <th>Address</th>
                                        <th>Appointment Date</th>
                                        <th>Time</th>
                                        <th>Remark</th>
                                        <th>Status</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($appointments as $appointment)
                                        <tr>
                                            <td>{{ucfirst($appointment->patient->patient_name)}}</td>
                                            <td>{{$appointment->patient->phone_number}}</td>
                                            <td>{{$appointment->patient->address}}</td>
                                            <td>{{$appointment->new_appointment}}</td>
                                            <td>{{$appointment->time}}</td>
                                            <td>{{$appointment->remark}}</td>
                                            <td>
                                                <form id="submit-form" action="{{url('change_appointment_status')}}" method="post">
                                                    {{csrf_field()}}
                                                    <label class="switch">
                                                        <input type="checkbox" @if($appointment->status ==1) checked @endif name="status" onclick="this.form.submit()">
                                                        <span class="slider round"></span>
                                                        <span class="absolute-no">Close</span>
                                                        <input type="hidden" name="id" value="{{$appointment->id}}">
                                                    </label><style>
                                                        .switch {
                                                            position: relative;
                                                            display: inline-block;
                                                            width: 100px;
                                                            height: 30px;
                                                        }

                                                        .switch input {display:none;}

                                                        .slider {
                                                            position: absolute;
                                                            cursor: pointer;
                                                            overflow: hidden;
                                                            top: 0;
                                                            left: 0;
                                                            right: 0;
                                                            bottom: 0;
                                                            background-color: #f2f2f2;
                                                            -webkit-transition: .4s;
                                                            transition: .4s;
                                                        }

                                                        .slider:before {
                                                            position: absolute;
                                                            z-index: 2;
                                                            content: "";
                                                            height: 27px;
                                                            width: 27px;
                                                            left: 2px;
                                                            bottom: 2px;
                                                            background-color: darkslategrey;
                                                            -webkit-box-shadow: 0 2px 5px rgba(0, 0, 0, 0.22);
                                                            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.22);
                                                            -webkit-transition: .4s;
                                                            transition: all 0.4s ease-in-out;
                                                        }
                                                        .slider:after {
                                                            position: absolute;
                                                            left: 0;
                                                            z-index: 1;
                                                            content: "Open";
                                                            font-size: 14px;
                                                            text-align: left !important;
                                                            line-height: 30px;
                                                            padding-left: 0;
                                                            width: 100px;
                                                            color: #fff;
                                                            height: 30px;
                                                            border-radius: 100px;
                                                            background-color: #ffc751;
                                                            -webkit-transform: translateX(-160px);
                                                            -ms-transform: translateX(-160px);
                                                            transform: translateX(-160px);
                                                            transition: all 0.4s ease-in-out;
                                                        }

                                                        input:checked + .slider:after {
                                                            -webkit-transform: translateX(0px);
                                                            -ms-transform: translateX(0px);
                                                            transform: translateX(0px);
                                                            /*width: 235px;*/
                                                            padding-left: 25px;
                                                        }

                                                        input:checked + .slider:before {
                                                            background-color: #fff;
                                                            padding-left: 25px;

                                                        }

                                                        input:checked + .slider:before {
                                                            -webkit-transform: translateX(70px);
                                                            -ms-transform: translateX(70px);
                                                            transform: translateX(70px);
                                                        }

                                                        /* Rounded sliders */
                                                        .slider.round {
                                                            border-radius: 100px;
                                                        }

                                                        .slider.round:before {
                                                            border-radius: 50%;
                                                        }
                                                        .absolute-no {
                                                            position: absolute;
                                                            left: 0;
                                                            right: 10px;
                                                            color: darkslategrey;
                                                            text-align: right !important;
                                                            font-size: 14px;
                                                            width: calc(100% - 25px);
                                                            height: 70px;
                                                            line-height: 30px;
                                                            cursor: pointer;
                                                        }
                                                    </style>
                                                </form>
                                            </td>
                                            </tr>

                                    @endforeach
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section> <!-- /.content -->

    </div> <!-- /.content-wrapper -->
    @include('footer')
</div> <!-- ./wrapper -->
<!-- ./wrapper -->
<!-- Start Core Plugins
=====================================================================-->
<!-- jQuery -->
<script src="{{asset('assets/plugins/jQuery/jquery-1.12.4.min.js')}}" type="text/javascript"></script>
<!-- jquery-ui -->
<script src="{{asset('assets/plugins/jquery-ui-1.12.1/jquery-ui.min.js')}}" type="text/javascript"></script>
<!-- Bootstrap -->
<script src="{{asset('assets/bootstrap/js/bootstrap.min.js')}}" type="text/javascript"></script>
<!-- lobipanel -->
<script src="{{asset('assets/plugins/lobipanel/lobipanel.min.js')}}" type="text/javascript"></script>
<!-- Pace js -->
<script src="{{asset('assets/plugins/pace/pace.min.js')}}" type="text/javascript"></script>
<!-- SlimScroll -->
<script src="{{asset('assets/plugins/slimScroll/jquery.slimscroll.min.js')}}" type="text/javascript"></script>
<!-- FastClick -->
<script src="{{asset('assets/plugins/fastclick/fastclick.min.js')}}" type="text/javascript"></script>
<!-- Hadmin frame -->
<script src="{{asset('assets/dist/js/custom1.js')}}" type="text/javascript"></script>
<!-- End Core Plugins
=====================================================================-->
<!-- Start Theme label Script
=====================================================================-->
<!-- Dashboard js -->
<script src="{{asset('assets/dist/js/custom.js')}}" type="text/javascript"></script>
<!-- End Theme label Script
=====================================================================-->
<script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap.min.js" type="text/javascript"></script>
<script>
    $(document).ready(function () {
        $('#dataTable').DataTable();
    });
</script>
{{--<script>--}}
{{--$("#success-alert").fadeTo(8000, 2000).slideUp(2000, function(){--}}
{{--$("#success-alert").slideUp(2000);--}}
{{--});--}}
{{--</script>--}}
</body>
</html>
