<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Employees List</title>

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
                <h1>Employee</h1>
                <small>Employee List</small>
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
                                <a class="btn btn-primary btn-list" href="#" data-toggle="modal" data-target="#modal-success"> <i class="fa fa-plus"></i> Add Staff</a>
                                <a class="btn btn-primary btn-list" href="#" data-toggle="modal" data-target="#modal-salary"> <i class="fa fa-money"></i> Pay Salary</a>
                                <a class="btn btn-primary btn-list" href="#" data-toggle="modal" data-target="#modal-advance"> <i class="fa fa-list-ol"></i> Pay Advance</a>

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
                                        <th>Mobile</th>
                                        <th>Address</th>
                                        <th>Advance Money</th>
                                        <th>Join Date</th>
                                        <th>See Records</th>
                                        <th>Edit</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($staffs as $staff)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{ucfirst($staff->name)}}</td>
                                            <td>{{$staff->phone_number}}</td>
                                            <td>{{$staff->address}}</td>
                                            <td>{{$staff->advance_money}}</td>
                                            <td>{{$staff->join_date}}</td>
                                            <td><a type="button" href="{{url('staffrecords',$staff->id)}}" class="btn btn-primary btn-outline w-md m-b-5">See Records</a></td>
                                            <td><a type="button" href="{{route('staff.edit',$staff->id)}}" class="btn btn-primary btn-outline w-sm"><i class="fa fa-edit"></i></a></td>
                                        </tr>

                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="modal fade modal-success" id="modal-success" tabindex="-1" role="dialog" style="display: none;">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                            <h1 class="modal-title">Add New Staff</h1>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{route('staff.store')}}" enctype="multipart/form-data" method="post" id="staff_form">
                                                <input type = "hidden" name = "_token" value = "<?php echo csrf_token() ?>" />

                                                <div class="form-group">
                                                    <label>Name</label>
                                                    <input type="text" class="form-control" name="name" placeholder="Enter Staff Name" required>

                                                </div>
                                                <div class="form-group" id="total_fee_div">
                                                    <label>Mobile</label>
                                                    <input type="number" class="form-control" name="phone_number" placeholder="Enter Staff Mobile" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>Address</label>
                                                    <input type="text"  class="form-control" name="address"  placeholder="Enter Staff Address" required>
                                                </div>

                                                <div class="form-group">
                                                    <label>Join Date</label>
                                                    <input type="date" class="form-control" name="date" required>
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
                            <div class="modal fade modal-success" id="modal-salary" tabindex="-1" role="dialog" style="display: none;">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                            <h1 class="modal-title"> Salary</h1>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{route('salary.store')}}" enctype="multipart/form-data" method="post" id="salary_form">
                                                <input type = "hidden" name = "_token" value = "<?php echo csrf_token() ?>" />

                                                <div class="form-group">
                                                    <label>Name</label>
                                                    <select name="staff_id" id="staff_id" class="form-control" required>

                                                        <option value="" disabled="disabled" selected>Select</option>                                                        @foreach($staffs as $staff)
                                                            <option value="{{$staff->id}}">{{ucfirst($staff->name)}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group" id="total_fee_div">
                                                    <label>Advance Amount</label>
                                                    <input type="number" class="form-control" name="advance" id="advance" placeholder="Advance Amount" readonly required>
                                                </div>
                                                <div class="form-group">
                                                    <label>Salary</label>
                                                    <input type="number"  class="form-control" name="amount"  placeholder="Salary Quantity" required>
                                                </div>

                                                <div class="form-group">
                                                    <label> Date</label>
                                                    <input type="date" class="form-control" name="date" required>
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
                            <div class="modal fade modal-success" id="modal-advance" tabindex="-1" role="dialog" style="display: none;">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                            <h1 class="modal-title">Pay Advance</h1>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{route('advance.store')}}" enctype="multipart/form-data" method="post" id="advance_form">
                                                <input type = "hidden" name = "_token" value = "<?php echo csrf_token() ?>" />

                                                <div class="form-group">
                                                    <label>Name</label>
                                                    <select name="staff_id" id="staff_id" class="form-control" required>

                                                        <option value="" disabled="disabled" selected>Select</option>                                                        @foreach($staffs as $staff)
                                                            <option value="{{$staff->id}}">{{ucfirst($staff->name)}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group" id="total_fee_div">
                                                    <label>Advance Money</label>
                                                    <input type="number" class="form-control" name="amount" placeholder="Advance Money" required>
                                                </div>

                                                <div class="form-group">
                                                    <label> Date</label>
                                                    <input type="date" class="form-control" name="date" required>
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


<script>
    $(document).ready(function () {
        $('#dataTable').DataTable();
    });
</script>

<!-- End Theme label Script
=====================================================================-->

<script>
    $(document).ready(function(){

        $(document).on('change','#staff_id',function(){

            var staff_id =$(this).val();
            // console.log("hummm loooooo"+ patient_id);
            $.ajax({
                type:'get',
                url:'{!!URL::to('getadvance')!!}',
                data:{'id':staff_id},
                success:function(data){

                    //  console.log('success');
                    // console.log(data);
                    $('#advance').val(data);

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
