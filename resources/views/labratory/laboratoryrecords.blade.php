<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laboratory Records</title>

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
                <h1>Laboratory</h1>
                <small>Laboratory Records</small>
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
                                <a class="btn btn-primary" href="{{route('labratory_records.create')}}">
                                    <i class="fa fa-plus"></i>  Laboratory Order </a>
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
                                        <th>P_Name</th>
                                        <th>Mobile</th>
                                        <th>Address</th>
                                        <th>L_Name</th>
                                        <th>OutPot Date</th>
                                        <th>Teeth Number</th>
                                        <th>Company</th>
                                        <th>Color</th>
                                        <th>Type</th>
                                        <th>Price</th>
                                        <th>InPot Date(Receive)</th>
                                        <th>Delete</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($lab_records as $lab_record)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{ucfirst($lab_record->patient->patient_name)}}</td>
                                            <td>{{$lab_record->patient->phone_number}}</td>
                                            <td>{{$lab_record->patient->address}}</td>
                                            <td>{{$lab_record->labratory->name}}</td>
                                            <td>{{$lab_record->outpot}}</td>
                                            <td>{{$lab_record->teeth_number}}</td>
                                            <td>{{$lab_record->company}}</td>
                                            <td>{{$lab_record->color}}</td>
                                            <td>{{$lab_record->type}}</td>
                                            <td>{{$lab_record->price}}</td>
                                            @if($lab_record->paid_amount > 0)
                                                <td><a class="btn btn-danger btn-list" href="#" data-toggle="modal" data-price="{{$lab_record->price}}" data-outpot="{{$lab_record->outpot}}" data-patient="{{ucfirst($lab_record->patient->patient_name)}}" data-lab="{{$lab_record->labratory->name}}" data-lab_id="{{$lab_record->labratory->id}}" data-id="{{$lab_record->id}}" data-target="#modal-receive">Received / <b>{{$lab_record->paid_amount}}</b></a></td>
                                          @else
                                                <td><a class="btn btn-primary btn-list" href="#" data-toggle="modal" data-price="{{$lab_record->price}}" data-outpot="{{$lab_record->outpot}}" data-patient="{{ucfirst($lab_record->patient->patient_name)}}" data-lab="{{$lab_record->labratory->name}}" data-lab_id="{{$lab_record->labratory->id}}" data-id="{{$lab_record->id}}" data-target="#modal-receive">Receive</a></td>

                                            @endif
                                            <td>
                                                <form action="{{route('labratory_records.destroy',$lab_record->id)}}" method="POST" >
                                                    <input type="hidden" name="_method" value="delete">
                                                    {!! csrf_field() !!}
                                                    <button onclick="return confirm('Are you sure?')" type="submit" class="close-icon btn btn-primary btn-outline" ><i class="fa fa-remove"> </i></button>
                                                </form>
                                            </td>                                          </tr>


                                    @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <div class="modal fade modal-success" id="modal-receive" tabindex="-1" role="dialog" style="display: none;">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                            <h1 class="modal-title">Receive Date</h1>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{url('updatelab')}}" enctype="multipart/form-data" method="post" id="lab_form">
                                                <input type = "hidden" name = "_token" value = "<?php echo csrf_token() ?>" />
                                                {{--<input type="hidden" name="_method" value="PUT">--}}
                                                <input type = "hidden" name = "id" id="id">
                                                <input type = "hidden" name = "lab_id" id="lab_id">

                                                <div class="form-group">
                                                    <label>Pa_Name</label>
                                                    <input type="text" class="form-control" id="pa_name" name="name"  readonly>

                                                </div>
                                                <div class="form-group">
                                                    <label>LAB_Name</label>
                                                    <input type="text" class="form-control" id="lab_name" name="name" readonly>

                                                </div>
                                                <div class="form-group" id="total_fee_div">
                                                    <label>OutPot Date</label>
                                                    <input type="text" class="form-control" id="outpot" readonly>
                                                </div>
                                                <div class="form-group">
                                                    <label>Price</label>
                                                    <input type="text"  class="form-control" id="price" readonly>
                                                </div>
                                                <div class="form-group">
                                                    <label>InPot Date</label>
                                                    <input type="date" class="form-control"id="inpot_date" name="inpot_date" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>Pay Amount</label>
                                                    <input type="number" class="form-control" name="pay_amount" placeholder="Enter Pay amount here" required>
                                                </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-success">Save changes</button>

                                            </div>
                                            </form>
                                        </div>
                                    </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
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

<!-- End Theme label Script
=====================================================================-->

<script>
    $('#modal-receive').on('show.bs.modal',function (event) {
        var button = $(event.relatedTarget)
        var id = button.data('id')
        var lab_id = button.data('lab_id')
        var lab = button.data('lab')
        var patient = button.data('patient')
        var outpot = button.data('outpot')
        var price = button.data('price')
        var modal = $(this)
        modal.find('.modal-body #id').val(id);
        modal.find('.modal-body #lab_name').val(lab);
        modal.find('.modal-body #pa_name').val(patient);
        modal.find('.modal-body #outpot').val(outpot);
        modal.find('.modal-body #price').val(price);
        modal.find('.modal-body #lab_id').val(lab_id);
        $('#inpot_date').attr('required', true);
    });
</script>
<script>

    $("#success-alert").fadeTo(2000, 500).slideUp(500, function(){
        $("#success-alert").slideUp(500);
    });
</script>
<script>
    $(document).ready(function () {
        $('#dataTable').DataTable();
    });
</script>
</body>
</html>
