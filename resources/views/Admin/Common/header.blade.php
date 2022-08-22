<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>AdminLTE | Dashboard</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- bootstrap 3.0.2 -->
        <link href="{{asset('Admin/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
        <!-- font Awesome -->
        <link href="{{asset('Admin/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="{{asset('Admin/css/ionicons.min.css')}}" rel="stylesheet" type="text/css" />
        <!-- Morris chart -->
        <!-- <link href="{{asset('assets/css/morris/morris.css')}}" rel="stylesheet" type="text/css" /> -->
        <!-- jvectormap -->
        <!-- <link href="{{asset('assets/css/jvectormap/jquery-jvectormap-1.2.2.css')}}" rel="stylesheet" type="text/css" /> -->
        <!-- fullCalendar -->
        <!-- <link href="{{asset('assets/css/fullcalendar/fullcalendar.css')}}" rel="stylesheet" type="text/css" /> -->
        <!-- Daterange picker -->
        <!-- <link href="{{asset('assets/css/daterangepicker/daterangepicker-bs3.css')}}" rel="stylesheet" type="text/css" /> -->
        <!-- bootstrap wysihtml5 - text editor -->
        <!-- <link href="{{asset('assets/css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}" rel="stylesheet" type="text/css" /> -->

         <!-- DATA TABLES -->
        <link href="{{asset('Admin/css/datatables/dataTables.bootstrap.css')}}" rel="stylesheet" type="text/css" />

        <!-- <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css"> -->
        <!-- Theme style -->
        <link href="{{asset('Admin/css/AdminLTE.css')}}" rel="stylesheet" type="text/css" />
        <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.16/css/bootstrap-multiselect.min.css" /> -->
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
        @toastr_css
        <style type="text/css">
            .no-print
            {
                display: none!important;
            }
            .error
            {
                color: red;
            }
        </style>
    </head>
    <body class="skin-black">
        <!-- header logo: style can be found in header.less -->
        <header class="header">
            <a href="javascript:Void(0);" class="logo">
                <!-- Add the class icon to your logo image or logo icon to add the margining -->
                AdminLTE
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <div class="navbar-right">
                    <ul class="nav navbar-nav">                          
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="glyphicon glyphicon-user"></i>
                                <span>{{Auth::User()->name}} <i class="caret"></i></span>
                            </a>
                             @php  $profile_img = "Admin/img/avatar3.png"; @endphp
                    @if(Auth::User()->profile_img)
                    @php $profile_img = Auth::User()->profile_img; @endphp
                    
                     @endif
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header bg-light-blue">
                                    <img src="{{asset($profile_img)}}" class="img-circle" alt="User Image" style="width: 74px;height: 74px;" />
                                    <p>
                                        {{Auth::User()->name}}                                         
                                    </p>
                                </li>
                                <!-- Menu Body -->
                                <li class="user-body" style="display: flex;justify-content: center;">
                                    <!--<div class="col-xs-4 text-center">-->
                                    <!--    <a href="#">Followers</a>-->
                                    <!--</div>-->
                                    <div class="col-md-6 text-center btn btn-light btn-sm">
                                        <a href="{{url('/Admin-Profile')}}">Change Password</a>
                                    </div>
                                    <!--<div class="col-xs-4 text-center">-->
                                    <!--    <a href="#">Friends</a>-->
                                    <!--</div>-->
                                </li>
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="{{url('/Admin-Profile')}}" class="btn btn-default btn-flat">Profile</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="{{url('/logout')}}" class="btn btn-default btn-flat">Sign out</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="left-side sidebar-offcanvas">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div class="pull-left image">
                            <img src="{{asset($profile_img)}}" class="img-circle" alt="User Image" style="width: 43px;height: 43px;"/>
                        </div>
                        <div class="pull-left info">
                            <p>Hello, {{Auth::User()->name}}</p>

                            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                        </div>
                    </div>
                    <!-- search form -->
                     
                    <!-- /.search form -->
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">
                        <li class="@if($flag == 1) active @endif">
                            <a href="{{url('/Dashboard')}}">
                                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                            </a>
                        </li>                        
                       <li class="@if($flag == 9) active @endif">
                            <a href="{{url('/Client-Template')}}">
                                <i class="fa fa-th"></i> <span>Client-Template</span> 
                            </a>
                        </li>                         
                         
                        <li class="treeview @if($inline == 1) active @endif">
                            <a href="#">
                                <i class="fa fa-folder"></i> <span>Elements</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                
                                <li>
                                    <a href="{{url('/Template-List')}}"><i class="fa fa-angle-double-right"></i> Template List</a>
                                </li>
                                <li>
                                    <a href="{{url('/Contain-List')}}"><i class="fa fa-angle-double-right"></i> Contain</a>
                                </li>
                                <li>
                                    <a href="{{url('/Template-Type')}}"><i class="fa fa-angle-double-right"></i> Template Type</a>
                                </li>
                                <li>
                                    <a href="{{url('/Country')}}"><i class="fa fa-angle-double-right"></i> Country</a>
                                </li>
                                <li>
                                    <a href="{{url('/State')}}"><i class="fa fa-angle-double-right"></i> State</a>
                                </li>
                                <li>
                                    <a href="{{url('/City')}}"><i class="fa fa-angle-double-right"></i> City</a>
                                </li>
                                <li><a href="{{url('/Department')}}"><i class="fa fa-angle-double-right"></i> Department</a></li>
                                <li><a href="{{url('/Employee')}}"><i class="fa fa-angle-double-right"></i> Employee</a></li>
                                <li><a href="{{url('/Department-Head')}}"><i class="fa fa-angle-double-right"></i> Department Head</a></li>
                                <li><a href="{{url('/Business-Vertical')}}"><i class="fa fa-angle-double-right"></i> Business Vertical</a></li>
                                  <li><a href="{{url('/Approval-List')}}"><i class="fa fa-angle-double-right"></i> Approval-Request</a></li>
                                <li><a href="pages/examples/blank.html"><i class="fa fa-angle-double-right"></i></a></li> 
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="{{url('/Client-List')}}">
                                <i class="fa fa-th"></i> <span>Client</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li>
                                    <a href="{{url('/Client-List')}}"><i class="fa fa-angle-double-right"></i> Client List</a>
                                </li>
                                <li class="@if($flag == 9) active @endif ">
                                    <a href="{{url('/Client-Template')}}">
                                        <i class="fa fa-angle-double-right"></i> <span>Client-Template</span> 
                                    </a>
                                </li>
                                                                  
                            </ul>
                        </li>
                       

                     <!--     @ if(DB::table('nextprocesses')->where('emp_id', Auth::User()->id)->exists())
                        <li class="@ i f($ flag == 4) active @ endif">
                            <a href="{{url('/Client-Event')}}">
                                <i class="fa fa-dashboard"></i> <span>Add Event</span>
                            </a>
                        </li>                        
                        @ endif                   -->                                 
                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>