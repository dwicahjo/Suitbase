<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SUITBASE</title>

    <!-- Bootstrap Core CSS -->
    <link href="/assets/plugins/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="/assets/plugins/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Timeline CSS -->
    <link href="/assets/css/timeline.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="/assets/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="/assets/plugins/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="/assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>

    <body>
        <div id="wrapper">
            <!-- Navigation -->
            <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="/">SUITBASE</a>
                </div>
                <!-- /.navbar-header -->
                @if (Auth::user())
                <ul class="nav navbar-top-links navbar-right">
                    <li>
                        REMAINING DAY OF LEAVE:  {{ Auth::user()->number_leave }} Days
                    </li>
                    <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-bell fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-alerts">
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-comment fa-fw"></i> New Comment
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                                    <span class="pull-right text-muted small">12 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-envelope fa-fw"></i> Message Sent
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-tasks fa-fw"></i> New Task
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-upload fa-fw"></i> Server Rebooted
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>See All Alerts</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-alerts -->
                </li>
                    <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                </ul>
                @else
                <ul class="nav navbar-top-links navbar-right">
                    <li><a href="{{ url('/login') }}">Login</a></li>
                </ul>
                @endif
                <!-- /.navbar-top-links -->

                <div class="navbar-default sidebar" role="navigation">
                    <div class="sidebar-nav navbar-collapse">
                        <ul class="nav" id="side-menu">
                            <li class="sidebar-search">
                                @if (Auth::user())
                                <div class="input-group custom-search-form">
                                    <span>
                                        <img alt="image" class="img-circle img-responsive" src="upload/photos/{{ Auth::user()->photo }}">
                                    </span>
                                    <br>
                                    <span class="clear">
                                        <div class="col-lg-12 pager">
                                            <span class="block m-t-xs">
                                                {{ Auth::user()->name }}
                                            </span>
                                        </div>
                                        <br>
                                       {{--  <span class="text-muted text-xs block"> {{ Auth::user()->divisions_id }} </span>
                                        <span class="text-muted text-xs block"> {{ Auth::user()->departments_id }} </span> --}}
                                {{-- <ul class="dropdown-menu animated fadeInRight m-t-xs">
                                    <li><a href="pages/myProfile">Profile</a></li>
                                    <li><a href="pages/login">Logout</a></li>
                                </ul> --}}
                            </div>
                            @endif
                            <!-- /input-group -->
                        </li>
                        <li>
                            <a href="home"><i class="fa fa-dashboard fa-fw"></i> Home</a>
                        </li>
                        <li>
                            <a href="myProfile"><i class="fa fa-user fa-fw"></i>My Profile</a>
                        </li>
                        @if (Auth::user()->type == 'HR')
                            <li>
                                <a href="#"><i class="fa fa-users fa-fw"></i> Users<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                <li>
                                    <a href="createAccount">Create Account</a>
                                </li>
                                <li>
                                    <a href="listOfUser">View List Of Users</a>
                                </li>
                            </ul>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-table fa-fw"></i> Request</a>
                            </li>
                        @endif
                        <li>
                             <a href="#"><i class="fa fa-reorder fa-fw"></i> Leave<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="createLeave">Create Leave</a>
                                </li>
                                <li>
                                    <a href="myLeave">View My Leave</a>
                                </li>
                                @if (Auth::user()->type == 'HR' || Auth::user()->type == 'Supervisor')
                                    <li>
                                        <a href="listOfLeave">View List of Leave</a>
                                    </li>
                                @endif
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-reorder fa-fw"></i> Remote <span class="fa arrow"></span></a>
                               <ul class="nav nav-second-level">
                                <li>
                                    <a href="createRemote">Create Remote</a>
                                </li>
                                <li>
                                    <a href="myRemote">View My Remote</a>
                                </li>
                                @if (Auth::user()->type == 'HR' || Auth::user()->type == 'Supervisor')
                                    <li>
                                        <a href="listOfRemote">View List of Remote</a>
                                    </li>
                                @endif
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-reorder fa-fw"></i> Training<span class="fa arrow"></span></a>
                               <ul class="nav nav-second-level">
                                <li>
                                    <a href="createTraining">Create Training</a>
                                </li>

                                <li>
                                    <a href="myTraining">View My Training</a>
                                </li>
                                @if (Auth::user()->type == 'Finance')
                                    <li>
                                        <a href="listOfTraining">View List of Training</a>
                                    </li>
                                @endif
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-reorder fa-fw"></i> Procurement<span class="fa arrow"></span></a>
                             <ul class="nav nav-second-level">
                                <li>
                                    <a href="createProcurement">Create Procurement</a>
                                </li>
                                <li>
                                    <a href="myProcurement">View My Procurement</a>
                                </li>
                                @if (Auth::user()->type == 'Finance')
                                    <li>
                                        <a href="listOfProcurement">View List of Procurement</a>
                                    </li>
                                @endif
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-reorder fa-fw"></i>Overtime<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="createOvertime">Create Overtime</a>
                                </li>
                                <li>
                                    <a href="myOvertime">View My Overtime</a>
                                </li>
                                @if (Auth::user()->type == 'HR' || Auth::user()->type == 'Supervisor')
                                    <li>
                                        <a href="listOfOvertime">View List of Overtime</a>
                                    </li>
                                @endif
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-files-o fa-fw"></i>Appraisal<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="myAppraisal">View My Appraisal</a>
                                </li>
                                @if (Auth::user()->type == 'HR' || Auth::user()->type == 'Supervisor')
                                    <li>
                                        <a href="listofAppraisal">View List of Appraisal</a>
                                    </li>
                                    @if (Auth::user()->type == 'HR')
                                        <li>
                                            <a href="viewListAppraisalTemplate">View List of Appraisal Template</a>
                                        </li>
                                    @endif
                                @endif
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-pencil fa-fw"></i>Feedback<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="createFeedback">Create Feedback</a>
                                </li>
                                @if (Auth::user()->type == 'HR')
                                    <li>
                                        <a href="listOfFeedback">View List of Feedback</a>
                                    </li>
                                @endif
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        @if (Auth::user()->type == 'HR')
                            <li>
                                <a href="#"><i class="fa fa-check-square-o fa-fw"></i> Survey<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="listOfSurvey">View List of Survey</a>
                                    </li>
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>
                        @endif
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->

            </div>
            <!-- /.sidebar-collapse -->
        </div>
        <!-- /.navbar-static-side -->
    
    </nav>

    @section('content')
    @show
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

    <!-- jQuery -->
    <script src="assets/plugins/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="assets/plugins/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="assets/plugins/metisMenu/dist/metisMenu.min.js"></script>

    <!-- DataTables JavaScript -->
    <script src="assets/plugins/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="assets/plugins/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="assets/js/sb-admin-2.js"></script>

    <script src="/js/createAppraisal.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });
    });
    </script>
</body>

</html>
