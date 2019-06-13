<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add Appointment</title>

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

    <!-- Bootstrap-wysihtml5 css -->
    <link href="{{asset('assets/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css')}}" rel="stylesheet" type="text/css"/>
    <!-- Themify icons -->
    <link href="{{asset('assets/themify-icons/themify-icons.css')}}" rel="stylesheet" type="text/css"/>
    <!-- End Global Mandatory Style
    =====================================================================-->
    <!-- Start Theme Layout Style
    =====================================================================-->
    <!-- Theme style -->
    <link href="{{asset('assets/dist/css/stylehealth.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css" rel="stylesheet" />
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
@include('aside')
<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="header-icon">
                <i class="pe-7s-note2"></i>
            </div>
            <div class="header-title">

                <h1>Appointment</h1>
                <small>Add Appointment</small>
                <ol class="breadcrumb hidden-xs">
                    <li><a href="{{asset('/')}}"><i class="pe-7s-home"></i> Home</a></li>
                    <li class="active">Dashboard</li>
                </ol>
            </div>
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <!-- Form controls -->
                <div class="col-sm-12">
                    <div class="panel panel-bd lobidrag">
                        <div class="panel-heading">
                            <div class="btn-group">
                                <a class="btn btn-primary" href="{{route('appointment.index')}}">
                                    <i class="fa fa-list"></i>  Appointment List </a>
                            </div>
                        </div>
                        @if(session()->has('message'))

                            <div class="alert alert-warning alert-dismissible" id="success-alert">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                {{ session()->get('message') }}
                            </div>
                        @endif
                        <div class="panel-body">
                            <form class="col-sm-6" action="{{route('appointment.store')}}" enctype="multipart/form-data" method="post">
                                <input type = "hidden" name = "_token" value = "<?php echo csrf_token() ?>" />
                                <div class="form-group">
                                    <label>Patient Name</label>
                                    <select name="patient_id" id="patient_id" class="form-control" required>

                                        <option value="" disabled="disabled" selected>Select</option>                                        @foreach($patients as $patient)
                                            <option value="{{$patient->id}}">{{$patient->patient_name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Address</label>
                                    <input type="text" class="form-control" name="address" id="address" placeholder="Patient Address" readonly required>

                                </div>
                                <div class="form-group" id="total_fee_div">
                                    <label>Mobile</label>
                                    <input type="number" class="form-control" id="mobile" name="mobile" placeholder="Mobile Number" readonly required>
                                </div>
                                <div class="form-group">
                                    <label>Last Appointment</label>
                                    <input type="text"  class="form-control" id="last_appointment" name="last_appointment"  placeholder="Last Appointment" readonly required>
                                </div>

                                <div class="form-group">
                                    <label>Appointment Date</label>
                                    <input type="date" class="form-control" name="date" required>
                                </div>
                                <div class="form-group">
                                    <label>Time</label>
                                    <input type="time" class="form-control" id="time" name="time"  placeholder="Appointment Time" required>
                                </div>
                                <div class="form-group">
                                    <label>Remark</label>
                                    <textarea class="form-control" rows="5" name="remark" ></textarea>
                                </div>
                                <div class="reset-button">
                                    <button type="submit" class="btn btn-info w-md m-b-5">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </section> <!-- /.content -->
    </div> <!-- /.content-wrapper -->
    @include('footer')
</div> <!-- ./wrapper -->
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $('#patient_id').select2();
    });
</script>

<!-- End Theme label Script
=====================================================================-->
<script>
    $(document).ready(function(){

        $(document).on('change','#patient_id',function(){

            var patient_id =$(this).val();
            // console.log("hummm loooooo"+ patient_id);
            $.ajax({
                type:'get',
                url:'{!!URL::to('getaddress')!!}',
                data:{'id':patient_id},
                success:function(data){

                    //  console.log('success');
                    // console.log(data);
                    $('#address').val(data);

                },
                error:function(){

                }
            });
            $.ajax({
                type:'get',
                url:'{!!URL::to('getphone')!!}',
                data:{'id':patient_id},
                success:function(data){

                    //  console.log('success');
                    // console.log(data);
                     $('#mobile').val(data);

                },
                error:function(){

                }
            });
            $.ajax({
                type:'get',
                url:'{!!URL::to('lastappointment')!!}',
                data:{'id':patient_id},
                success:function(data){

                    //  console.log('success');
                    // console.log(data);

                    if ($.isEmptyObject(data)){
                       // console.log("lo");
                        $('#last_appointment').val("No Appointment Yet");

                    }
                    else{
                       // console.log(data);
                        $('#last_appointment').val(data);

                    }
                },
                error:function(){

                }
            });
        });
    });
</script>
<script>
    $("#success-alert").fadeTo(2000, 500).slideUp(500, function(){
        $("#success-alert").slideUp(500);
    });
</script>

</body>

</html>
