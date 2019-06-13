<header class="main-header">
    <a href="{{url('/')}}" class="logo"> <!-- Logo -->
        <span class="logo-mini">
                        <!--<b>A</b>H-admin-->
                        <img src="{{asset('assets/dist/img/mini-logo.png')}}" alt="">
                    </span>
        <span class="logo-lg">
                        <!--<b>Admin</b>H-admin-->
                        <img src="{{asset('assets/dist/img/logo.png')}}" alt="">
                    </span>
    </a>
    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top ">
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button"> <!-- Sidebar toggle button-->
            <span class="sr-only">Toggle navigation</span>
            <span class="fa fa-tasks"></span>
        </a>
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <li class="dropdown notifications-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="pe-7s-bell"></i>
                        <span class="label label-warning">{{$today_appointments_count}}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header"><i class="fa fa-bell"></i> {{$today_appointments_count}} Appointments</li>
                        <li>
                            <ul class="menu">
                                @foreach($today_appointments as $t_appointment)
                                <li>
                                    <a href="#" class="border-gray"><i class="fa fa-user-circle-o"></i> <b>{{ucfirst($t_appointment->patient->patient_name)}}</b> <small style="color: #8e8d8d">has appointment at</small> <span class=" label-success label label-default pull-right">{{$t_appointment->time}}</span></a>
                                </li>
                                    @endforeach
                            </ul>
                        </li>
                        <li class="footer">
                            <a href="#"> See all Notifications <i class=" fa fa-arrow-right"></i></a>
                        </li>
                    </ul>
                </li>
                <!-- Tasks -->

                <!-- user -->
                <li class="dropdown dropdown-user admin-user">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <div class="user-image">
                            @can('isAdmin')
                            <img src="{{asset('images')}}\{{$profile->banner}}" class="img-circle" height="40" width="40" alt="User Image">
                        @endcan
                                @can('isReception')
                                    <img src="{{asset('images')}}\{{$profile->banner}}" class="img-circle" height="40" width="40" alt="User Image">
                                @endcan

                        </div>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="{{route('profile.create')}}"><i class="fa fa-user"></i> Change Profile</a></li>
                        <li><a href="{{ url('changepassword') }}"><i class="fa fa-gear"></i> Change Password</a></li>
                        <li><a href="{{route('logout')}}" onclick="event.preventDefault();
          document.getElementById('logout-form').submit();"><i class="fa fa-sign-out"></i> Logout</a></li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>
