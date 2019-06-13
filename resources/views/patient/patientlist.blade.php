<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Patients List</title>

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
    @include('header')    <!-- =============================================== -->
    <!-- Left side column. contains the sidebar -->
   @include('aside')
    <!-- =============================================== -->
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="header-icon">
                <i class="pe-7s-box1"></i>
            </div>
            <div class="header-title">
                <h1>Patient</h1>
                <small>Patients List</small>
                <ol class="breadcrumb hidden-xs">
                    <li><a href="{{url('/')}}"><i class="pe-7s-home"></i> Home</a></li>
                    <li class="active">Dashboard</li>
                </ol>
            </div>
        </section>
        <!-- Main content -->
        <section class="content">


            <div class="row">
                <div class="col-sm-12">
                    <div class="panel panel-bd lobidrag">
                        <div class="panel-heading">
                            <div class="btn-group">
                                <a class="btn btn-success" href="{{route('patient.create')}}"> <i class="fa fa-plus"></i>  Add patient</a>
                            </div>

                        </div>
                        @if(session()->has('message'))

                            <div class="alert alert-warning alert-dismissible" id="success-alert">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                {{ session()->get('message') }}
                            </div>
                        @endif
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table id="dataTable" class="table table-bordered table-hover">
                                    <thead class="success">
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>F/Name</th>
                                        <th>Mobile</th>
                                        <th>Address</th>
                                        {{--<th>TOS</th>--}}
                                        <th>OPD</th>
                                        <th>sex</th>
                                        <th>Total</th>
                                        <th>Received</th>
                                        <th>Loan</th>
                                        <th>See Records</th>
                                        <th>Edit</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($patients as $patient)
                                        @if($patient->total_fee > $patient->received_amount )
                                    <tr style="color: #e84126;">
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ucfirst($patient->patient_name)}}</td>
                                        <td>{{ucfirst($patient->patient_fname)}}</td>
                                        <td>{{$patient->phone_number}}</td>
                                        <td>{{$patient->address}}</td>
                                        {{--<td>{{$patient->type_of_service}}</td>--}}
                                        <td>{{$patient->OPD}}</td>
                                        <td>{{$patient->gender}}</td>
                                        <td>{{$patient->total_fee}}</td>
                                        <td>{{$patient->received_amount}}</td>
                                        <td>{{$patient->loan_amount}}</td>
                                        <td><a href="{{url('patientrecords',$patient->id)}}" type="button" class="btn btn-danger btn-outline w-md m-b-5">See Records</a></td>
                                        <td><a type="button" href="{{route('patient.edit',$patient->id)}}" class="btn btn-danger btn-outline w-sm"><i class="fa fa-edit"></i></a></td>
                                    </tr>
                                        @else
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ucfirst($patient->patient_name)}}</td>
                                                <td>{{ucfirst($patient->patient_fname)}}</td>
                                                <td>{{$patient->phone_number}}</td>
                                                <td>{{$patient->address}}</td>
                                                {{--<td>{{$patient->type_of_service}}</td>--}}
                                                <td>{{$patient->OPD}}</td>
                                                <td>{{$patient->gender}}</td>
                                                <td>{{$patient->total_fee}}</td>
                                                <td>{{$patient->received_amount}}</td>
                                                <td>{{$patient->loan_amount}}</td>
                                                <td><a href="{{url('patientrecords',$patient->id)}}" type="button" class="btn btn-primary btn-outline w-md m-b-5">See Records</a></td>
                                                <td><a href="{{route('patient.edit',$patient->id)}}" type="button" class="btn btn-primary btn-outline w-sm"><i class="fa fa-edit"></i></a></td>
                                            </tr>

                                    @endif
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
<script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap.min.js" type="text/javascript"></script>


<script>
    $(document).ready(function () {
        $('#dataTable').DataTable();
    });
</script>
<script>
    $("#success-alert").fadeTo(2000, 500).slideUp(500, function(){
        $("#success-alert").slideUp(500);
    });
</script>
<!-- End Theme label Script
=====================================================================-->
</body>
</html>
