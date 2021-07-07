<!DOCTYPE html>
<html moznomarginboxes mozdisallowselectionprint>
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title')</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <meta name="csrf-token" content="{{csrf_token()}}">
    <link rel="stylesheet" href="{{url('public/asset/bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet"  href="{{url('public/asset/bower_components/font-awesome/css/font-awesome.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet"  href="{{url('public/asset/bower_components/Ionicons/css/ionicons.min.css')}}">
    <!-- daterange picker -->
{{--    <link rel="stylesheet"  href="{{url('public/asset/bower_components/bootstrap-daterangepicker/daterangepicker.css')}}">--}}
    <!-- bootstrap datepicker -->
{{--    <link rel="stylesheet"  href="{{url('public/asset/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}">--}}
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet"  href="{{url('public/asset/plugins/iCheck/all.css')}}">
    <!-- Bootstrap Color Picker -->
    <link rel="stylesheet"  href="{{url('public/asset/bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css')}}">
    <!-- Bootstrap time Picker -->
{{--    <link rel="stylesheet"  href="{{url('public/asset/plugins/timepicker/bootstrap-timepicker.min.css')}}">--}}
    <!-- Select2 -->
    <link rel="stylesheet"  href="{{url('public/asset/bower_components/select2/dist/css/select2.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet"  href="{{url('public/asset/dist/css/AdminLTE.min.css')}}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet"  href="{{url('public/asset/dist/css/skins/_all-skins.min.css')}}">
    <link rel="stylesheet"  href="{{url('public/asset/toast/jquery.toast.css')}}">
    <link rel="stylesheet" href="{{url('public/asset/jquery-ui.css')}}">
    @yield('extracss')
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <style>
        .col-lg-1, .col-lg-10, .col-lg-11, .col-lg-12, .col-lg-2, .col-lg-3, .col-lg-4, .col-lg-5, .col-lg-6, .col-lg-7,
        .col-lg-8, .col-lg-9, .col-md-1, .col-md-10, .col-md-11, .col-md-12, .col-md-2, .col-md-3, .col-md-4, .col-md-5,
        .col-md-6, .col-md-7, .col-md-8, .col-md-9, .col-sm-1, .col-sm-10, .col-sm-11, .col-sm-12, .col-sm-2, .col-sm-3,
        .col-sm-4, .col-sm-5, .col-sm-6, .col-sm-7, .col-sm-8, .col-sm-9, .col-xs-1, .col-xs-10, .col-xs-11, .col-xs-12,
        .col-xs-2, .col-xs-3, .col-xs-4, .col-xs-5, .col-xs-6, .col-xs-7, .col-xs-8, .col-xs-9 {
            position: relative;
            min-height: 1px;
            padding-right: 7px;
            padding-left: 7px;
        }
    </style>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    <header class="main-header">
        <!-- Logo -->
        <a href="" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>RFL</b></span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>Rab Forensic Lab</b></span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- Messages: style can be found in dropdown.less-->

                    <!-- Notifications: style can be found in dropdown.less -->

                    <!-- Tasks: style can be found in dropdown.less -->
                    <!-- User Account: style can be found in dropdown.less -->
                    @php
                        $Image =url("public/asset/dist/img/user2-160x160.jpg");
                        if(Cookie::get('user_photo'))
                            $Image = Cookie::get('user_photo');
                    @endphp
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="{{ $Image}}" class="user-image" alt="User Image">
                            <span class="hidden-xs">{{ Cookie::get('user_name') }}</span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">
                                <img src="{{$Image}}" class="img-circle" alt="User Image">

                                <p>
                                    {{ Cookie::get('name') }}
                                </p>
                            </li>
                            <li class="user-footer">
                                <div class="pull-right">
                                    <a href="{{ url('logout') }}" class="btn btn-default btn-flat">Log Out </a>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="{{url('public/asset/dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
                </div>
                <div class="pull-left info">
                    <p>{{ Cookie::get('name') }}</p>
                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
            </div>
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu" data-widget="tree">
                @if(Cookie::get('role') == 1)
                    <li class="@yield('analysisReport')">
                        <a href ="{{ url('analysisReport') }}" >
                            <i class="fa fa-medkit"></i> <span>Report</span>
                        </a>
                    </li>
                    <li class="treeview  @yield('settings')">
                        <a href="#">
                            <i class="fa fa-address-book"></i>
                            <span>Settings</span>
                            <span class="pull-right-container">
                              <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li class="@yield('sampleType')">
                                <a href ="{{ url('sampleType') }}" >
                                    <i class="fa fa-medkit"></i> <span>Sample Type</span>
                                </a>
                            </li>
                            <li class="@yield('enclosedItem')">
                                <a href ="{{ url('enclosedItem') }}" >
                                    <i class="fa fa-medkit"></i> <span>Enclosed Item</span>
                                </a>
                            </li>
                            <li class="@yield('methodology')">
                                <a href ="{{ url('methodology') }}" >
                                    <i class="fa fa-user-circle"></i> <span>Methodology</span>
                                </a>
                            </li>
                            <li class="@yield('directorDesignation')">
                                <a href ="{{ url('directorDesignation') }}" >
                                    <i class="fa fa-user-circle"></i> <span>Signatory</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endif
                @if(Cookie::get('role') == 2)
                    <li class="@yield('receiveReport')">
                        <a href ="{{ url('receiveReport') }}" >
                            <i class="fa fa-medkit"></i> <span>Received Sample</span>
                        </a>
                    </li>
                @endif
                @if(Cookie::get('role') == 3)
                    <li class="@yield('finalReport')">
                        <a href ="{{ url('finalReport') }}" >
                            <i class="fa fa-medkit"></i> <span>Report</span>
                        </a>
                    </li>
                    <li class="@yield('users')">
                        <a href ="{{ url('users') }}" >
                            <i class="fa fa-user-circle"></i> <span>Users</span>
                        </a>
                    </li>
                @endif
            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                @yield('page_header')
            </h1>
        </section>
        <section class="content">
            @yield('content')
        </section>
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
        <center><strong>&copy;Rab Forensic Lab. Made by  <a href="https://parallaxsoft.com/">Parallax Soft Inc.</a></strong></center>
    </footer>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="{{url('public/asset/bower_components/jquery/dist/jquery.min.js')}}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{url('public/asset/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- Select2 -->
<script src="{{url('public/asset/bower_components/select2/dist/js/select2.full.min.js')}}"></script>
<!-- InputMask -->
<script src="{{url('public/asset/plugins/input-mask/jquery.inputmask.js')}}"></script>
<script src="{{url('public/asset/plugins/input-mask/jquery.inputmask.date.extensions.js')}}"></script>
<script src="{{url('public/asset/plugins/input-mask/jquery.inputmask.extensions.js')}}"></script>
<!-- date-range-picker -->
<script src="{{url('public/asset/bower_components/moment/min/moment.min.js')}}"></script>
{{--<script src="{{url('public/asset/bower_components/bootstrap-daterangepicker/daterangepicker.js')}}"></script>--}}
<!-- bootstrap datepicker -->
{{--<script src="{{url('public/asset/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>--}}
<!-- bootstrap color picker -->
<script src="{{url('public/asset/bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js')}}"></script>
<!-- bootstrap time picker -->
{{--<script src="{{url('public/asset/plugins/timepicker/bootstrap-timepicker.min.js')}}"></script>--}}
<!-- SlimScroll -->
<script src="{{url('public/asset/bower_components/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
<!-- iCheck 1.0.1 -->
<script src="{{url('public/asset/plugins/iCheck/icheck.min.js')}}"></script>
<!-- FastClick -->
<script src="{{url('public/asset/bower_components/fastclick/lib/fastclick.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{url('public/asset/dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{url('public/asset/dist/js/demo.js')}}"></script>
<script src="{{url('public/asset/jquery-ui.js')}}"></script>
<script src="{{url('public/asset/toast/jquery.toast.js')}}"></script>
<script src="{{url('public/asset/print/jquery.jqprint-0.3.js')}}"></script>
<!-- Page script -->
@yield('js')
</body>
</html>
