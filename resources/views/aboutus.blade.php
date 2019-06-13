<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>About Us</title>

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
            <div class="header-icon"><i class="pe-7s-user"></i></div>
            <div class="header-title">
                <h1>About Us</h1>
                <small>We are here!</small>
                <ol class="breadcrumb hidden-xs">
                    <li class="active">This is</li>
                    <li><a href="www.devzoneict.com">DevZone</a></li>
                </ol>
            </div>
        </section>
        <!-- Main content -->
        <div class="content">
            <div class="row">
                <div class="col-sm-12 col-md-12">
                    <div class="panel panel-bd lobidrag">
                        <div class="panel-heading">
                            <div class="panel-title">
                                <h4 class="text text-purple">DevZone Software Development</h4>
                            </div>
                        </div>
                        <br>
                        <div class="panel-body">
                            <p class="text text-justify">DevZone is an experienced software development and information technology company based in Afghanistan. DevZone was founded in 2017 to provide best IT services to people. We have enough research, design, development and implementation experience in various Communications and IT environments. <br>
                                We're turned on by new ideas and new technology. We're providing best services, support, features, uptime, and site performance in various IT environments. All our work is assuring quality control, timely delivery and fast turnaround. We are proud to be a part of our clients' team, If you're looking for right ICT services among thousands, Devzone will be the right choice! MISSION: We provide ICT solutions to face real-world challenges.
                                We earn and keep our client's trust by delivering standard quality services.</p>

                        <br><br><br>
                            <p><b>Email:</b> info@devzoneict.com</p>
                            <br>
                            <p><b>Mobile:</b> 0093791643460</p>
                            <br>
                            <p><b>Address:</b> Ansari square, Kabul, Afghanistan</p>
                        </div>
                        <br><br><br><br>

                    </div>
                </div>
            </div>
        </div> <!-- /.content -->
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
<!-- End Theme label Script
=====================================================================-->
</body>
</html>
