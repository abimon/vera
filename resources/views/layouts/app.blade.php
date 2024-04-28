<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="robots" content="noindex,nofollow">
    <title>HEALTH LAB</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('storage/assets/img/log.png')}}">
    <!-- Custom CSS -->
    
    <link href="{{asset('storage/assets2/plugins/bower_components/chartist/dist/chartist.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('storage/assets2/plugins/bower_components/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.css')}}">
    <!-- Custom CSS -->
    <link href="{{asset('storage/assets2/css/style.min.css')}}" rel="stylesheet">
</head>

<body>
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full" data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
        <header class="topbar" data-navbarbg="skin5">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-header" data-logobg="skin6">
                    <a class="navbar-brand bg-dark" href="/">
                        <!-- Logo icon -->
                        <b class="logo-icon" style="text-align: center;">
                            <!-- Dark Logo icon -->
                            <!-- <img src="{{asset('storage/images/logo.png')}}" height="70" alt="homepage"/> -->
                            <h1 class="text-light bg-dark">Health Labs</h1>
                        </b>
                        <span class="logo-text">
                            
                        </span>
                    </a>
                    <a class="nav-toggler waves-effect waves-light text-dark d-block d-md-none" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                </div>
                <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
                    <ul class="navbar-nav ms-auto d-flex align-items-center">
                        <li>
                            <a class="profile-pic" href="#">
                                <i class="fa fa-user"></i> 
                                <span class="text-white font-medium"> @if(Auth()->user())
                                    {{Auth()->user()->name}}({{Auth()->user()->role}}) 
                                    @endif
                                </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        @if(Auth()->user())
        <aside class="left-sidebar" data-sidebarbg="skin6">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <!-- User Profile-->
                        <li class="sidebar-item pt-2">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="/" aria-expanded="false">
                                <i class="far fa-clock" aria-hidden="true"></i>
                                <span class="hide-menu">Dashboard</span>
                            </a>
                        </li>
                        <!-- <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="/inquiries" aria-expanded="false">
                                <i class="fa fa-question" aria-hidden="true"></i>
                                <span class="hide-menu">Inquiries</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="/responses" aria-expanded="false">
                                <i class="fa fa-reply" aria-hidden="true"></i>
                                <span class="hide-menu">Responses</span>
                            </a>
                        </li> -->
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('appointments.index')}}" aria-expanded="false">
                                <i class="fa fa-calendar-check" aria-hidden="true"></i>
                                <span class="hide-menu">Appointments</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('prescriptions.index')}}" aria-expanded="false">
                                <i class="fa fa-list-ol" aria-hidden="true"></i>
                                <span class="hide-menu">Prescriptions</span>
                            </a>
                        </li>
                        <!-- <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="/messages" aria-expanded="false">
                                <i class="fa fa-envelope" aria-hidden="true"></i>
                                <span class="hide-menu">Messages</span>
                            </a>
                        </li> -->
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('reminder.index')}}" aria-expanded="false">
                                <i class="fa fa-bell" aria-hidden="true"></i>
                                <span class="hide-menu">Reminders</span>
                            </a>
                        </li>
                        @if((Auth()->user()->role=='Admin')&&(Auth()->user()->isApproved==1))
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('user.index')}}" aria-expanded="false">
                                <i class="fa fa-users" aria-hidden="true"></i>
                                <span class="hide-menu">Users</span>
                            </a>
                        </li>
                        @endif
                        <li class="sidebar-item ">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link text-danger" href="/logout" aria-expanded="false">
                                <i class="fa fa-power-off text-danger" aria-hidden="true"></i>
                                <span class="hide-menu">Logout</span>
                            </a>
                        </li>
                    </ul>

                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        @endif
        <div class="page-wrapper">
           <div class="mt-3 mb-3" style="min-height: 500px;">
            @yield('content')
           </div>
            <footer class="footer text-between">
                2022 - {{date('Y')}} © Health Labs
                <a href="https://apekinc.top/">APEK INC</a>
            </footer>
        </div>
    </div>
    <script src="{{asset('storage/assets2/plugins/bower_components/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{asset('storage/assets2/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('storage/assets2/js/app-style-switcher.js')}}"></script>
    <script src="{{asset('storage/assets2/plugins/bower_components/jquery-sparkline/jquery.sparkline.min.js')}}"></script>
    <script src="{{asset('storage/assets2/js/waves.js')}}"></script>
    <script src="{{asset('storage/assets2/js/sidebarmenu.js')}}"></script>
    <script src="{{asset('storage/assets2/js/custom.js')}}"></script>
    <script src="{{asset('storage/assets2/plugins/bower_components/chartist/dist/chartist.min.js')}}"></script>
    <script src="{{asset('storage/assets2/plugins/bower_components/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js')}}"></script>
    <script src="{{asset('storage/assets2/js/pages/dashboards/dashboard1.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>

