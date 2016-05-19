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
    <link href="{{asset('assets/plugins/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="{{asset('assets/plugins/metisMenu/dist/metisMenu.min.css')}}" rel="stylesheet">

    <!-- Timeline CSS -->
    <link href="{{asset('assets/css/timeline.css')}}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{asset('assets/css/sb-admin-2.css')}}" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="{{asset('assets/plugins/morrisjs/morris.css')}}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{asset('assets/plugins/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">

    <link href="{{asset('css/sweetalert.css')}}" rel="stylesheet">

    <!-- jQuery -->
    <script src="{{asset('assets/plugins/jquery/dist/jquery.min.js')}}"></script>

    <!-- SweetAlert -->
    <script src="{{asset('js/sweetalert.min.js')}}"></script>

    <link href='https://fonts.googleapis.com/css?family=Sigmar+One' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Quicksand:700' rel='stylesheet' type='text/css'>

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
                                        <img alt="image" class="img-responsive" src="{{asset("upload/photos/".Auth::user()->photo)}}">
                                    </span>
                                    <br>
                                    <span class="clear">
                                        <div class="col-lg-12 pager">
                                            <span class="block m-t-xs">
                                                {{ Auth::user()->name }}
                                            </span>
                                        </div>
                                        <br>
                                </div>
                            @endif
                            <!-- /input-group -->
                            </li>
                            <li>
                                <a href="{{ route('home') }}"><i class="fa fa-dashboard fa-fw"></i> Home</a>
                            </li>
                            <li>
                                <a href="{{ route('user.details.current') }}"><i class="fa fa-user fa-fw"></i>My Profile</a>
                            </li>
                            @if (Auth::user()->type == 'HR' || Auth::user()->type == 'Admin')
                            <li>
                                <a href="#"><i class="fa fa-users fa-fw"></i> Users<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{ route('user.create') }}">Create Account</a>
                                </li>
                                <li>
                                    <a href="{{ route('user.list') }}">View List Of Users</a>
                                </li>
                            </ul>
                            </li>
                            <li>
                                <a href="{{ route('recap.request') }}"><i class="fa fa-table fa-fw"></i> Request</a>
                            </li>
                        @endif
                        <li>
                             <a href="#"><i class="fa fa-reorder fa-fw"></i> Leave<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{route('leaves.create')}}">Create Leave</a>
                                </li>
                                <li>
                                    <a href="{{route('leaves.list.current')}}">View My Leave</a>
                                </li>
                                @if (Auth::user()->type == 'HR' || Auth::user()->type == 'Supervisor' || Auth::user()->type == 'Admin')
                                    <li>
                                        <a href="{{route('leaves.list.all')}}">View List of Leave</a>
                                    </li>
                                @endif
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-reorder fa-fw"></i> Remote <span class="fa arrow"></span></a>
                               <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{route('remotes.create')}}">Create Remote</a>
                                </li>
                                <li>
                                    <a href="{{route('remotes.list.current')}}">View My Remote</a>
                                </li>
                                @if (Auth::user()->type == 'HR' || Auth::user()->type == 'Supervisor' || Auth::user()->type == 'Admin')
                                    <li>
                                        <a href="{{route('remotes.list.all')}}">View List of Remote</a>
                                    </li>
                                @endif
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-reorder fa-fw"></i> Training<span class="fa arrow"></span></a>
                               <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{ route('trainings.create') }}">Create Training</a>
                                </li>

                                <li>
                                    <a href="{{ route('trainings.list.current') }}">View My Training</a>
                                </li>
                                @if (Auth::user()->type == 'Finance' || Auth::user()->type == 'HR' || Auth::user()->type == 'Admin')
                                    <li>
                                        <a href="{{ route('trainings.list.all') }}">View List of Training</a>
                                    </li>
                                @endif
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-reorder fa-fw"></i> Procurement<span class="fa arrow"></span></a>
                             <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{ route('procurements.create') }}">Create Procurement</a>
                                </li>
                                <li>
                                    <a href="{{ route('procurements.list.current') }}">View My Procurement</a>
                                </li>
                                @if (Auth::user()->type == 'Finance' || Auth::user()->type == 'HR' || Auth::user()->type == 'Admin')
                                    <li>
                                        <a href="{{ route('procurements.list.all') }}">View List of Procurement</a>
                                    </li>
                                @endif
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-reorder fa-fw"></i>Overtime<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{ route('overtime.create') }}">Create Overtime</a>
                                </li>
                                <li>
                                    <a href="{{ route('overtime.list.current') }}">View My Overtime</a>
                                </li>
                                @if (Auth::user()->type == 'HR' || Auth::user()->type == 'Supervisor' || Auth::user()->type == 'Admin')
                                    <li>
                                        <a href="{{ route('overtime.list.all') }}">View List of Overtime</a>
                                    </li>
                                @endif
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-files-o fa-fw"></i>Appraisal<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{route('appraisal.my')}}">View My Appraisal</a>
                                </li>
                                @if (Auth::user()->type == 'HR' || Auth::user()->type == 'Supervisor' || Auth::user()->type == 'Admin')
                                    <li>
                                        <a href="{{route('appraisal.list')}}">View List of Appraisal</a>
                                    </li>
                                    @if (Auth::user()->type == 'HR' || Auth::user()->type == 'Admin')
                                        <li>
                                            <a href="{{route('appraisal.create')}}">Create Appraisal Template</a>
                                        </li>
                                        <li>
                                            <a href="{{route('appraisal.template')}}">View List of Appraisal Template</a>
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
                                    <a href="{{route('feedback.create')}}">Create Feedback</a>
                                </li>
                                @if (Auth::user()->type == 'HR' || Auth::user()->type == 'Admin')
                                    <li>
                                        <a href="{{route('feedback.list')}}">View Feedbacks</a>
                                    </li>
                                @endif
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                            <li>
                                <a href="#"><i class="fa fa-check-square-o fa-fw"></i> Survey<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="{{route('survey.mylist')}}">View My Survey</a>
                                    </li>
                                     @if (Auth::user()->type == 'HR' || Auth::user()->type == 'Admin')
                                    <li>
                                        <a href="{{route('survey.create')}}">Create Survey</a>
                                    </li>
                                    <li>
                                        <a href="{{route('survey.list')}}">View List of Survey</a>
                                    </li>
                                     <li>
                                        <a href="{{route('survey.form')}}">View List of Survey Form</a>
                                    </li>
                                    @endif


                                </ul>
                                <!-- /.nav-second-level -->
                            </li>
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

    <!-- Bootstrap Core JavaScript -->
    <script src="{{asset('assets/plugins/bootstrap/dist/js/bootstrap.min.js')}}"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="{{asset('assets/plugins/metisMenu/dist/metisMenu.min.js')}}"></script>

    <!-- DataTables JavaScript -->
    <script src="{{asset('assets/plugins/datatables/media/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js')}}"></script>

    <!-- ChartJS JavaScript -->
    <script src="{{asset('assets/plugins/chartjs/Chart.js')}}"></script>

    <!-- Custom Theme JavaScript -->
    <script src="{{asset('assets/js/sb-admin-2.js')}}"></script>

    <script src="{{asset('js/createAppraisal.js')}}"></script>
    <script src="{{asset('js/createSurvey.js')}}"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });
    });

    $('a.cancel').click(function(e) {
        e.preventDefault(); // Prevent the href from redirecting directly
        var linkURL = $(this).attr("href");
        warnBeforeRedirect(linkURL);
    });

    $('a.approval').click(function(e) {
        e.preventDefault(); // Prevent the href from redirecting directly
        var linkURL = $(this).attr("href");
        warnBeforeRedirect(linkURL);
    });

    function warnBeforeRedirect(linkURL) {
        swal({
            title: "Are you sure?",
            text: "If you click 'Yes', you won't be able to reverse the action",
            type: "warning",
            showCancelButton: true,
            confirmButtonText: "Yes",
            confirmButtonColor: "#ec6c62"
        }, function() {
            // Redirect the user
            window.location.href = linkURL;
        });
    }
    </script>
    @section('scripts')
    @show
</body>

</html>
