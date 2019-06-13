<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add New Order</title>

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

                <h1>Laboratory</h1>
                <small>New Order</small>
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
                                <a class="btn btn-primary" href="{{route('labratory_records.index')}}">
                                    <i class="fa fa-list"></i>  Laboratory Records </a>
                            </div>
                        </div>
                        @if(session()->has('message'))

                            <div class="alert alert-warning alert-dismissible" id="success-alert">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                {{ session()->get('message') }}
                            </div>
                        @endif
                        <div class="panel-body">
                            <form class="col-sm-8" action="{{route('labratory_records.store')}}" enctype="multipart/form-data" method="post">
                                <input type = "hidden" name = "_token" value = "<?php echo csrf_token() ?>" />

                                <div class="form-group">
                                    <label>Laboratory Name</label>
                                    <select name="laboratory_id" class="form-control" required>
                                        <option value="" disabled="disabled" selected>Select</option>                                        @foreach($laboratories as $laboratory)
                                        <option value="{{$laboratory->id}}">{{ucfirst($laboratory->name)}}</option>
                                            @endforeach

                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Patient Name</label>
                                    <select name="patient_id" id="patient_id" class="form-control" required>
                                        <option value="" disabled="disabled" selected>Select</option>                                        @foreach($patients as $patient)
                                            <option value="{{$patient->id}}">{{ucfirst($patient->patient_name)}}</option>
                                        @endforeach

                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Mobile</label>
                                    <input type="text" class="form-control" id="phone_number" placeholder="Enter Mobile" readonly>
                                </div>
                                <div class="form-group">
                                    <label>Address</label>
                                    <input type="text" class="form-control" id="address" placeholder="Enter Address" readonly>
                                </div>

                                <div class="form-group">
                                    <label>Teeth Number</label>
                                    <select name="teeth_number" class="form-control" required>
                                        <option value="" disabled="disabled" selected>Select</option>                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                        <option>6</option>
                                        <option>7</option>
                                        <option>8</option>
                                        <option>9</option>
                                        <option>10</option>
                                        <option>11</option>
                                        <option>12</option>
                                        <option>13</option>
                                        <option>14</option>
                                        <option>15</option>
                                        <option>16</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Upper Teeth</label><br>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="teeth[]" value="1"> 1
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="teeth[]" value="2"> 2
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="teeth[]" value="3"> 3
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="teeth[]" value="4"> 4
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="teeth[]" value="5"> 5
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="teeth[]" value="6"> 6
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="teeth[]" value="7"> 7
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="teeth[]" value="8"> 8
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="teeth[]" value="9"> 9
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="teeth[]" value="10"> 10
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="teeth[]" value="11"> 11
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="teeth[]" value="12"> 12
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="teeth[]" value="13"> 13
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="teeth[]" value="14"> 14
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="teeth[]" value="15"> 15
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="teeth[]" value="16"> 16
                                    </label>

                                </div>
                                <div class="form-group">
                                    <label>Lower Teeth</label><br>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="teeth[]" value="-1"> 1
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="teeth[]" value="-2"> 2
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="teeth[]" value="-3"> 3
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="teeth[]" value="-4"> 4
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="teeth[]" value="-5"> 5
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="teeth[]" value="-6"> 6
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="teeth[]" value="-7"> 7
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="teeth[]" value="-8"> 8
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="teeth[]" value="-9"> 9
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="teeth[]" value="-10"> 10
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="teeth[]" value="-11"> 11
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="teeth[]" value="-12"> 12
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="teeth[]" value="-13"> 13
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="teeth[]" value="-14"> 14
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="teeth[]" value="-15"> 15
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="teeth[]" value="-16"> 16
                                    </label>

                                </div>
                                <div class="form-group">
                                    <label>Company Name</label>
                                    <select name="company" id="company" class="form-control" required>
                                        <option value="" disabled="disabled" selected>Select</option>
                                        <option value="Shofu inc.">Shofu inc.</option>
                                        <option value="Vitapan Classical (Vita)">Vitapan Classical (Vita)</option>
                                        <option value="Ivoclar vivadent">Ivoclar vivadent</option>

                                    </select>
                                </div>

                                <div class="form-group" id="shofu_colors" style="display:none;">
                                    <label>Color</label>
                                    <select name="color"  class="form-control">
                                        <option value="" disabled="disabled" selected>Select</option>
                                        <option>A1</option>
                                        <option>A2</option>
                                        <option>A3</option>
                                        <option>A3.5</option>
                                        <option>A4</option>
                                        <option>B1</option>
                                        <option>B2</option>
                                        <option>B3</option>
                                        <option>B4</option>
                                        <option>C1</option>
                                        <option>C2</option>
                                        <option>C3</option>
                                        <option>C4</option>
                                        <option>D2</option>
                                        <option>D3</option>
                                        <option>D4</option>
                                    </select>
                                </div>
                                <div class="form-group" id="vita_colors" style="display:none;">
                                    <label>Color</label>
                                    <select name="color"  class="form-control">
                                        <option value="" disabled="disabled" selected>Select</option>
                                        <option>A1</option>
                                        <option>A2</option>
                                        <option>A3</option>
                                        <option>A3.5</option>
                                        <option>A4</option>
                                        <option>B1</option>
                                        <option>B2</option>
                                        <option>B3</option>
                                        <option>B4</option>
                                        <option>C1</option>
                                        <option>C2</option>
                                        <option>C3</option>
                                        <option>C4</option>
                                        <option>D2</option>
                                        <option>D3</option>
                                        <option>D4</option>
                                    </select>
                                </div>

                                <div class="form-group" id="ivoclar_colors" style="display:none;">
                                    <label>Color</label>
                                    <select name="color"  class="form-control" >
                                        <option value="" disabled="disabled" selected>Select</option>
                                        <option>01/110</option>
                                        <option>1A/120</option>
                                        <option>2A/130</option>
                                        <option>1C/140</option>
                                        <option>2B/210</option>
                                        <option>1D/220</option>
                                        <option>1E/230</option>
                                        <option>2C/240</option>
                                        <option>3A/310</option>
                                        <option>5B/320</option>
                                        <option>2E/330</option>
                                        <option>3E/340</option>
                                        <option>4A/410</option>
                                        <option>6B/420</option>
                                        <option>4B/430</option>
                                        <option>6C/440</option>
                                        <option>6D/510</option>
                                        <option>4C/520</option>
                                        <option>3C/530</option>
                                        <option>4D/540</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Type</label>
                                    <select name="type" class="form-control" required>
                                        <option value="" disabled="disabled" selected>Select</option>
                                        <option>A+</option>
                                        <option>AB+</option>
                                        <option>O+</option>
                                        <option>AB-</option>
                                        <option>B+</option>
                                        <option>A-</option>
                                        <option>B-</option>
                                        <option>O-</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Price</label>
                                    <input type="text" class="form-control" name="price" placeholder="Enter Price" required>
                                </div>
                                <div class="form-group">
                                    <label>OutPot Date</label>
                                    <input type="date" class="form-control" name="outpot_date" required>
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
                    $('#phone_number').val(data);

                },
                error:function(){

                }
            });

        });
    });
</script>
<script>
    $(document).ready(function () {

        $('#company').on("change",function () {

            if(this.value == 'Shofu inc.'){
                $('#shofu_colors').show();
                $('#shofu_colors').prop('required','required');
                $('#vita_colors').hide();
                $('#ivoclar_colors').hide();

            }
            else if(this.value == 'Vitapan Classical (Vita)'){
                $('#vita_colors').show();
                $('#vita_colors').prop('required','required');
                $('#shofu_colors').hide();
                $('#ivoclar_colors').hide();

            }
            else{
                $('#vita_colors').hide();
                $('#shofu_colors').hide();
                $('#ivoclar_colors').show();
                $('#ivoclar_colors').prop('required','required');

            }
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
