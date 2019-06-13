<aside class="main-sidebar">
    <!-- sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="image pull-left">
                @can('isAdmin')
                    <img src="{{asset('images')}}\{{$profile->banner}}" class="img-circle" alt="User Image">
            @endcan
                    @can('isReception')
                        <img src="{{asset('images')}}\{{$profile->banner}}" class="img-circle" alt="User Image">
            @endcan
            </div>
            <div class="info">
                <h4>Welcome</h4>
                <p>Mr. {{ucfirst(\Illuminate\Support\Facades\Auth::user()->name)}}</p>
            </div>
        </div>

        <!-- sidebar menu -->
        <ul class="sidebar-menu">
            <li class="active">
                <a href="{{url('/')}}"><i class="fa fa-hospital-o"></i><span>Dashboard</span>
                </a>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-user"></i><span>Patient</span>
                    <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('patient.create')}}">Add patient</a></li>
                    <li><a href="{{route('patient.index')}}">Patient list</a></li>
                    <li><a href="{{route('payment.create')}}">Patient payment</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-check-square-o"></i><span>Appointment</span>
                    <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                                </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('appointment.create')}}">Add appointment</a></li>
                    <li><a href="{{url('upcoming_appointments')}}">Upcoming appointments</a></li>
                    <li><a href="{{url('closed_appointments')}}">Closed appointments</a></li>
                    <li><a href="{{url('todayappointments')}}">Today appointments</a></li>
                    <li><a href="{{route('appointment.index')}}">Appointment list</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-dribbble"></i><span>Laboratory</span>
                    <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('labratory.index')}}">Laboratory list</a></li>
                    <li><a href="{{route('labratory_records.create')}}">Laboratory Orders </a></li>
                    <li><a href="{{route('labratory_records.index')}}">Laboratory Records</a></li>
                    <li><a href="{{route('laboratory_payment.create')}}">Laboratory Payments</a></li>
                </ul>
            </li>

            @can('isAdmin')
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-credit-card-alt"></i><span>Expenses</span>
                    <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                                </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('dailyexpense.index')}}">Daily expenses</a></li>
                    <li><a href="{{route('material.index')}}">Material expenses</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-user-circle-o"></i><span>Human resource</span>
                    <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                            </span>
                </a>
                <ul class="treeview-menu">

                    <li><a href="{{route('staff.index')}}">Employee list</a></li>

                </ul>
            </li>

                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-users"></i><span>User management</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                            </span>
                    </a>
                    <ul class="treeview-menu">

                        <li><a href="{{url('changeuserspassword')}}">Change users password</a></li>
                        <li><a href="{{url('changeusersprofile')}}">Change users profile</a></li>
                    </ul>
                </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-file-text"></i><span>Report</span>
                    <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{url('patienttotalreport')}}">Patient Total Report</a></li>
                    <li><a href="{{url('patientpaymentreport')}}">Patient Payment Report</a></li>
                    <li><a href="{{url('appointmentreport')}}">Appointment Report</a></li>
                    <li><a href="{{url('laboratoryordersreport')}}">Laboratory Orders Report</a></li>
                    <li><a href="{{url('laboratorypaymentsreport')}}">Laboratory Payments Report</a></li>
                    <li><a href="{{url('dailyexpensereport')}}">Daily Expense Report</a></li>
                    <li><a href="{{url('materialexpensereport')}}">Material Expense Report</a></li>

                </ul>
            </li>

            <li>
                <a href="{{url('aboutus')}}">
                    <i class="fa fa-question-circle"></i><span> About us</span>
                </a>
            </li>
            @endcan
            <li>
                <a href="{{ route('logout') }}" onclick="event.preventDefault();
        document.getElementById('logout-form').submit();">
                    <i class="fa fa-sign-out"></i><span> LogOut</span>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </li>
        </ul>
    </div> <!-- /.sidebar -->
</aside>
