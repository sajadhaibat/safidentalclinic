<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@foreach ($appointments as $key=>$appointment)
            @if ($key>0)
                @break
            @endif
            {{ucfirst($appointment->patient->patient_name)}}
                @endforeach Records</title>

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
                <small>@foreach ($appointments as $key=>$appointment)
                        @if ($key>0)
                            @break
                        @endif
                        {{ucfirst($appointment->patient->patient_name)}}
                    @endforeach Records</small>
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
                                <a class="btn btn-success" href="#"> @foreach ($appointments as $key=>$appointment)
                                        @if ($key>0)
                                            @break
                                        @endif
                                        {{ucfirst($appointment->patient->patient_name)}}
                                        @endforeach Appointments </a>
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
                                        <th>Name</th>
                                        <th>last Appointment</th>
                                        <th>New Appointment</th>
                                        <th>Time</th>
                                        <th>Remark</th>
                                        <th>Status</th>
                                        <th>Delete</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($appointments as $appointment)
                                            <tr>
                                                <td>{{ucfirst($appointment->patient->patient_name)}}</td>
                                                <td>{{$appointment->last_appointment}}</td>
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
                                                <td>
                                                    <form action="{{route('appointment.destroy',$appointment->id)}}" method="POST" >
                                                        <input type="hidden" name="_method" value="delete">
                                                        {!! csrf_field() !!}
                                                        <button onclick="return confirm('Are you sure?')" type="submit" class="close-icon btn btn-primary btn-outline" ><i class="fa fa-remove"> </i></button>
                                                    </form>
                                                </td>                                               </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="panel panel-bd lobidrag">
                        <div class="panel-heading">
                            <div class="btn-group">
                                <a class="btn btn-success" href="#"> @foreach ($appointments as $key=>$appointment)
                                        @if ($key>0)
                                            @break
                                        @endif
                                        {{ucfirst($appointment->patient->patient_name)}}
                                    @endforeach Payments </a>
                            </div>

                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table id="dataTable1" class="table table-bordered table-hover">
                                    <thead class="success">
                                    <tr>
                                        <th>Name</th>
                                        <th>Total Fee</th>
                                        <th>Pervious Loan</th>
                                        <th>Pay Amount</th>
                                        <th>Loan Amount</th>
                                        <th>Date</th>
                                        <th>Remark</th>
                                        <th>Delete</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($payments as $payment)
                                        <tr>
                                            <td>{{ucfirst($payment->patient->patient_name)}}</td>
                                            <td>{{$payment->total_fee}}</td>
                                            <td>{{$payment->loan_amount}}</td>
                                            <td>{{$payment->pay_amount}}</td>
                                            <td>{{$payment->new_loan_amount}}</td>
                                            <td>{{$payment->date}}</td>
                                            <td>{{$payment->remark}}</td>
                                            <td>
                                                <form action="{{route('payment.destroy',$payment->id)}}" method="POST" >
                                                    <input type="hidden" name="_method" value="delete">
                                                    {!! csrf_field() !!}
                                                    <button onclick="return confirm('Are you sure?')" type="submit" class="close-icon btn btn-primary btn-outline" ><i class="fa fa-remove"> </i></button>
                                                </form>
                                            </td>                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="panel panel-bd lobidrag">
                        <div class="panel-heading">
                            <div class="btn-group">
                                <a class="btn btn-success" href="#"> @foreach ($appointments as $key=>$appointment)
                                        @if ($key>0)
                                            @break
                                        @endif
                                        {{ucfirst($appointment->patient->patient_name)}}
                                    @endforeach Lab Orders </a>
                            </div>

                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table id="dataTable2" class="table table-bordered table-hover">
                                    <thead class="success">
                                    <tr>
                                        <th>Name</th>
                                        <th>Teeth No.</th>
                                        <th>Company</th>
                                        <th>Color</th>
                                        <th>Type</th>
                                        <th>Teeth</th>
                                        <th>Price</th>
                                        <th>OutPot Date</th>
                                        <th>Inpot Date</th>
                                        <th>Delete</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($lab_records as $lab_record)
                                        <tr>
                                            <td>{{ucfirst($lab_record->patient->patient_name)}}</td>
                                            <td>{{$lab_record->teeth_number}}</td>
                                            <td>{{$lab_record->company}}</td>
                                            <td>{{$lab_record->color}}</td>
                                            <td>{{$lab_record->type}}</td>

                                            @if(empty($teeth))
                                                <td></td>
                                            @else

                                            <td>
                                                @if(in_array(1,$teeth ) === true)
                                                    <label class="checkbox-inline">
                                                        <input type="checkbox" name="teeth[]" value="1" {{in_array(1,$teeth ) ? "checked" : ""}}> 1
                                                    </label>
                                                @else
                                                    <label class="checkbox-inline" style="display: none">
                                                        <input type="checkbox" name="teeth[]" value="1" {{in_array(1,$teeth ) ? "checked" : ""}}> 1
                                                    </label>
                                                @endif
                                                @if(in_array(2,$teeth ) === true)
                                                    <label class="checkbox-inline">
                                                        <input type="checkbox" name="teeth[]" value="2" {{in_array(2,$teeth ) ? "checked" : ""}}> 2
                                                    </label>
                                                @else
                                                    <label class="checkbox-inline" style="display: none">
                                                        <input type="checkbox" name="teeth[]" value="2" {{in_array(2,$teeth ) ? "checked" : ""}}> 2
                                                    </label>
                                                @endif
                                                @if(in_array(3,$teeth ) === true)
                                                    <label class="checkbox-inline">
                                                        <input type="checkbox" name="teeth[]" value="3" {{in_array(3,$teeth ) ? "checked" : ""}}> 3
                                                    </label>
                                                @else
                                                    <label class="checkbox-inline" style="display: none">
                                                        <input type="checkbox" name="teeth[]" value="3" {{in_array(3,$teeth ) ? "checked" : ""}}> 3
                                                    </label>
                                                @endif

                                                @if(in_array(4,$teeth ) === true)
                                                    <label class="checkbox-inline">
                                                        <input type="checkbox" name="teeth[]" value="4" {{in_array(4,$teeth ) ? "checked" : ""}}> 4
                                                    </label>
                                                @else
                                                    <label class="checkbox-inline" style="display: none">
                                                        <input type="checkbox" name="teeth[]" value="4" {{in_array(4,$teeth ) ? "checked" : ""}}> 4
                                                    </label>
                                                @endif
                                                @if(in_array(5,$teeth ) === true)
                                                    <label class="checkbox-inline">
                                                        <input type="checkbox" name="teeth[]" value="5" {{in_array(5,$teeth ) ? "checked" : ""}}> 5
                                                    </label>
                                                @else
                                                    <label class="checkbox-inline" style="display: none">
                                                        <input type="checkbox" name="teeth[]" value="5" {{in_array(5,$teeth ) ? "checked" : ""}}> 5
                                                    </label>
                                                @endif
                                                @if(in_array(6,$teeth ) === true)
                                                    <label class="checkbox-inline">
                                                        <input type="checkbox" name="teeth[]" value="6" {{in_array(6,$teeth ) ? "checked" : ""}}> 6
                                                    </label>
                                                @else
                                                    <label class="checkbox-inline" style="display: none">
                                                        <input type="checkbox" name="teeth[]" value="6" {{in_array(6,$teeth ) ? "checked" : ""}}> 6
                                                    </label>
                                                @endif
                                                @if(in_array(7,$teeth ) === true)
                                                    <label class="checkbox-inline">
                                                        <input type="checkbox" name="teeth[]" value="7" {{in_array(7,$teeth ) ? "checked" : ""}}> 7
                                                    </label>
                                                @else
                                                    <label class="checkbox-inline" style="display: none">
                                                        <input type="checkbox" name="teeth[]" value="7" {{in_array(7,$teeth ) ? "checked" : ""}}> 7
                                                    </label>
                                                @endif
                                                @if(in_array(8,$teeth ) === true)
                                                    <label class="checkbox-inline">
                                                        <input type="checkbox" name="teeth[]" value="8" {{in_array(8,$teeth ) ? "checked" : ""}}> 8
                                                    </label>
                                                @else
                                                    <label class="checkbox-inline" style="display: none">
                                                        <input type="checkbox" name="teeth[]" value="8" {{in_array(8,$teeth ) ? "checked" : ""}}> 8
                                                    </label>
                                                @endif
                                                @if(in_array(9,$teeth ) === true)
                                                    <label class="checkbox-inline">
                                                        <input type="checkbox" name="teeth[]" value="9" {{in_array(9,$teeth ) ? "checked" : ""}}> 9
                                                    </label>
                                                @else
                                                    <label class="checkbox-inline" style="display: none">
                                                        <input type="checkbox" name="teeth[]" value="9" {{in_array(9,$teeth ) ? "checked" : ""}}> 9
                                                    </label>
                                                @endif
                                                @if(in_array(10,$teeth ) === true)
                                                    <label class="checkbox-inline">
                                                        <input type="checkbox" name="teeth[]" value="10" {{in_array(10,$teeth ) ? "checked" : ""}}> 10
                                                    </label>
                                                @else
                                                    <label class="checkbox-inline" style="display: none">
                                                        <input type="checkbox" name="teeth[]" value="10" {{in_array(10,$teeth ) ? "checked" : ""}}> 10
                                                    </label>
                                                @endif
                                                @if(in_array(11,$teeth ) === true)
                                                    <label class="checkbox-inline">
                                                        <input type="checkbox" name="teeth[]" value="11" {{in_array(11,$teeth ) ? "checked" : ""}}> 11
                                                    </label>
                                                @else
                                                    <label class="checkbox-inline" style="display: none">
                                                        <input type="checkbox" name="teeth[]" value="11" {{in_array(11,$teeth ) ? "checked" : ""}}> 11
                                                    </label>
                                                @endif
                                                @if(in_array(12,$teeth ) === true)
                                                    <label class="checkbox-inline">
                                                        <input type="checkbox" name="teeth[]" value="12" {{in_array(12,$teeth ) ? "checked" : ""}}> 12
                                                    </label>
                                                @else
                                                    <label class="checkbox-inline" style="display: none">
                                                        <input type="checkbox" name="teeth[]" value="12" {{in_array(12,$teeth ) ? "checked" : ""}}> 12
                                                    </label>
                                                @endif
                                                @if(in_array(13,$teeth ) === true)
                                                    <label class="checkbox-inline">
                                                        <input type="checkbox" name="teeth[]" value="13" {{in_array(13,$teeth ) ? "checked" : ""}}> 13
                                                    </label>
                                                @else
                                                    <label class="checkbox-inline" style="display: none">
                                                        <input type="checkbox" name="teeth[]" value="13" {{in_array(13,$teeth ) ? "checked" : ""}}> 13
                                                    </label>
                                                @endif
                                                @if(in_array(14,$teeth ) === true)
                                                    <label class="checkbox-inline">
                                                        <input type="checkbox" name="teeth[]" value="14" {{in_array(14,$teeth ) ? "checked" : ""}}> 14
                                                    </label>
                                                @else
                                                    <label class="checkbox-inline" style="display: none">
                                                        <input type="checkbox" name="teeth[]" value="14" {{in_array(14,$teeth ) ? "checked" : ""}}> 14
                                                    </label>
                                                @endif
                                                @if(in_array(15,$teeth ) === true)
                                                    <label class="checkbox-inline">
                                                        <input type="checkbox" name="teeth[]" value="15" {{in_array(15,$teeth ) ? "checked" : ""}}> 15
                                                    </label>
                                                @else
                                                    <label class="checkbox-inline" style="display: none">
                                                        <input type="checkbox" name="teeth[]" value="15" {{in_array(15,$teeth ) ? "checked" : ""}}> 15
                                                    </label>
                                                @endif
                                                @if(in_array(16,$teeth ) === true)
                                                    <label class="checkbox-inline">
                                                        <input type="checkbox" name="teeth[]" value="16" {{in_array(16,$teeth ) ? "checked" : ""}}> 16
                                                    </label>
                                                @else
                                                    <label class="checkbox-inline" style="display: none">
                                                        <input type="checkbox" name="teeth[]" value="16" {{in_array(16,$teeth ) ? "checked" : ""}}> 16
                                                    </label>
                                            @endif

                                            <!-- Lower part-->

                                                    @if(in_array(-1,$teeth ) === true)
                                                        <label class="checkbox-inline">
                                                            <input type="checkbox" name="teeth[]" value="-1" {{in_array(-1,$teeth ) ? "checked" : ""}}> -1
                                                        </label>
                                                    @else
                                                        <label class="checkbox-inline" style="display: none">
                                                            <input type="checkbox" name="teeth[]" value="-1" {{in_array(-1,$teeth ) ? "checked" : ""}}> -1
                                                        </label>
                                                    @endif
                                                    @if(in_array(-2,$teeth ) === true)
                                                        <label class="checkbox-inline">
                                                            <input type="checkbox" name="teeth[]" value="-2" {{in_array(-2,$teeth ) ? "checked" : ""}}> -2
                                                        </label>
                                                    @else
                                                        <label class="checkbox-inline" style="display: none">
                                                            <input type="checkbox" name="teeth[]" value="-2" {{in_array(-2,$teeth ) ? "checked" : ""}}> -2
                                                        </label>
                                                    @endif
                                                    @if(in_array(-3,$teeth ) === true)
                                                        <label class="checkbox-inline">
                                                            <input type="checkbox" name="teeth[]" value="-3" {{in_array(-3,$teeth ) ? "checked" : ""}}> -3
                                                        </label>
                                                    @else
                                                        <label class="checkbox-inline" style="display: none">
                                                            <input type="checkbox" name="teeth[]" value="-3" {{in_array(-3,$teeth ) ? "checked" : ""}}> -3
                                                        </label>
                                                    @endif

                                                    @if(in_array(-4,$teeth ) === true)
                                                        <label class="checkbox-inline">
                                                            <input type="checkbox" name="teeth[]" value="-4" {{in_array(-4,$teeth ) ? "checked" : ""}}> -4
                                                        </label>
                                                    @else
                                                        <label class="checkbox-inline" style="display: none">
                                                            <input type="checkbox" name="teeth[]" value="-4" {{in_array(-4,$teeth ) ? "checked" : ""}}> -4
                                                        </label>
                                                    @endif
                                                    @if(in_array(-5,$teeth ) === true)
                                                        <label class="checkbox-inline">
                                                            <input type="checkbox" name="teeth[]" value="-5" {{in_array(-5,$teeth ) ? "checked" : ""}}> -5
                                                        </label>
                                                    @else
                                                        <label class="checkbox-inline" style="display: none">
                                                            <input type="checkbox" name="teeth[]" value="-5" {{in_array(-5,$teeth ) ? "checked" : ""}}> -5
                                                        </label>
                                                    @endif
                                                    @if(in_array(-6,$teeth ) === true)
                                                        <label class="checkbox-inline">
                                                            <input type="checkbox" name="teeth[]" value="-6" {{in_array(-6,$teeth ) ? "checked" : ""}}> -6
                                                        </label>
                                                    @else
                                                        <label class="checkbox-inline" style="display: none">
                                                            <input type="checkbox" name="teeth[]" value="-6" {{in_array(-6,$teeth ) ? "checked" : ""}}> -6
                                                        </label>
                                                    @endif
                                                    @if(in_array(-7,$teeth ) === true)
                                                        <label class="checkbox-inline">
                                                            <input type="checkbox" name="teeth[]" value="-7" {{in_array(-7,$teeth ) ? "checked" : ""}}> -7
                                                        </label>
                                                    @else
                                                        <label class="checkbox-inline" style="display: none">
                                                            <input type="checkbox" name="teeth[]" value="-7" {{in_array(-7,$teeth ) ? "checked" : ""}}> -7
                                                        </label>
                                                    @endif
                                                    @if(in_array(-8,$teeth ) === true)
                                                        <label class="checkbox-inline">
                                                            <input type="checkbox" name="teeth[]" value="-8" {{in_array(-8,$teeth ) ? "checked" : ""}}> -8
                                                        </label>
                                                    @else
                                                        <label class="checkbox-inline" style="display: none">
                                                            <input type="checkbox" name="teeth[]" value="-8" {{in_array(-8,$teeth ) ? "checked" : ""}}> -8
                                                        </label>
                                                    @endif
                                                    @if(in_array(-9,$teeth ) === true)
                                                        <label class="checkbox-inline">
                                                            <input type="checkbox" name="teeth[]" value="-9" {{in_array(-9,$teeth ) ? "checked" : ""}}> -9
                                                        </label>
                                                    @else
                                                        <label class="checkbox-inline" style="display: none">
                                                            <input type="checkbox" name="teeth[]" value="-9" {{in_array(-9,$teeth ) ? "checked" : ""}}> -9
                                                        </label>
                                                    @endif
                                                    @if(in_array(-10,$teeth ) === true)
                                                        <label class="checkbox-inline">
                                                            <input type="checkbox" name="teeth[]" value="-10" {{in_array(-10,$teeth ) ? "checked" : ""}}> -10
                                                        </label>
                                                    @else
                                                        <label class="checkbox-inline" style="display: none">
                                                            <input type="checkbox" name="teeth[]" value="-10" {{in_array(-10,$teeth ) ? "checked" : ""}}> -10
                                                        </label>
                                                    @endif
                                                    @if(in_array(-11,$teeth ) === true)
                                                        <label class="checkbox-inline">
                                                            <input type="checkbox" name="teeth[]" value="-11" {{in_array(-11,$teeth ) ? "checked" : ""}}> -11
                                                        </label>
                                                    @else
                                                        <label class="checkbox-inline" style="display: none">
                                                            <input type="checkbox" name="teeth[]" value="-11" {{in_array(-11,$teeth ) ? "checked" : ""}}> -11
                                                        </label>
                                                    @endif
                                                    @if(in_array(-12,$teeth ) === true)
                                                        <label class="checkbox-inline">
                                                            <input type="checkbox" name="teeth[]" value="-12" {{in_array(-12,$teeth ) ? "checked" : ""}}> -12
                                                        </label>
                                                    @else
                                                        <label class="checkbox-inline" style="display: none">
                                                            <input type="checkbox" name="teeth[]" value="-12" {{in_array(-12,$teeth ) ? "checked" : ""}}> -12
                                                        </label>
                                                    @endif
                                                    @if(in_array(-13,$teeth ) === true)
                                                        <label class="checkbox-inline">
                                                            <input type="checkbox" name="teeth[]" value="13" {{in_array(-13,$teeth ) ? "checked" : ""}}> -13
                                                        </label>
                                                    @else
                                                        <label class="checkbox-inline" style="display: none">
                                                            <input type="checkbox" name="teeth[]" value="-13" {{in_array(-13,$teeth ) ? "checked" : ""}}> -13
                                                        </label>
                                                    @endif
                                                    @if(in_array(-14,$teeth ) === true)
                                                        <label class="checkbox-inline">
                                                            <input type="checkbox" name="teeth[]" value="-14" {{in_array(-14,$teeth ) ? "checked" : ""}}> -14
                                                        </label>
                                                    @else
                                                        <label class="checkbox-inline" style="display: none">
                                                            <input type="checkbox" name="teeth[]" value="-14" {{in_array(-14,$teeth ) ? "checked" : ""}}> -14
                                                        </label>
                                                    @endif
                                                    @if(in_array(-15,$teeth ) === true)
                                                        <label class="checkbox-inline">
                                                            <input type="checkbox" name="teeth[]" value="-15" {{in_array(15,$teeth ) ? "checked" : ""}}> -15
                                                        </label>
                                                    @else
                                                        <label class="checkbox-inline" style="display: none">
                                                            <input type="checkbox" name="teeth[]" value="-15" {{in_array(-15,$teeth ) ? "checked" : ""}}> -15
                                                        </label>
                                                    @endif
                                                    @if(in_array(-16,$teeth ) === true)
                                                        <label class="checkbox-inline">
                                                            <input type="checkbox" name="teeth[]" value="-16" {{in_array(-16,$teeth ) ? "checked" : ""}}> -16
                                                        </label>
                                                    @else
                                                        <label class="checkbox-inline" style="display: none">
                                                            <input type="checkbox" name="teeth[]" value="-16" {{in_array(-16,$teeth ) ? "checked" : ""}}> -16
                                                        </label>
                                            @endif
                                            @endif
                                            <td>{{$lab_record->price}}</td>
                                            <td>{{$lab_record->outpot}}</td>
                                            @if(empty($lab_record->inpot))
                                                <td>Not Yet</td>
                                          @else
                                                <td>{{$lab_record->inpot}}</td>
                                            @endif
                                            <td>
                                                <form action="{{route('labratory_records.destroy',$lab_record->id)}}" method="POST" >
                                                    <input type="hidden" name="_method" value="delete">
                                                    {!! csrf_field() !!}
                                                    <button onclick="return confirm('Are you sure?')" type="submit" class="close-icon btn btn-primary btn-outline" ><i class="fa fa-remove"> </i></button>
                                                </form>
                                            </td>                                         </tr>
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
    $(document).ready(function () {
        $('#dataTable1').DataTable();
    });
</script>
<script>
    $(document).ready(function () {
        $('#dataTable2').DataTable();
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
