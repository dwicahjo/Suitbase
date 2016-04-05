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
                <a class="navbar-brand" href="index.html">SUITBASE</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li> 
                REMAINING DAY OF LEAVE: 23 Days
                </li>
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <span>
                                    <img alt="image" class="img-circle" src="img/profile_small.jpg">
                                </span>
                                <br>
                                <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">David Williams</strong>
                                </span>
                                <br>
                                <span class="text-muted text-xs block">Art Director <b class="caret"></b></span> </span>


                                <!--yang lama 
                                <ul class="dropdown-menu animated fadeInRight m-t-xs">
                                    <li><a href="pages/myProfile">Profile</a></li>
                                    <li><a href="pages/login">Logout</a></li>
                                </ul>
                                -->
                            </div>

                            <!-- /input-group -->
                        </li>
                        <li>
                            <a href="/"><i class="fa fa-dashboard fa-fw"></i> Home</a>
                        </li>
                        <li>
                            <a href="myProfile"><i class="fa fa-user fa-fw"></i>My Profile</a>
                        </li>
                        <li>
                            <a href="listOfUser"><i class="fa fa-users fa-fw"></i> Users</a>
                        </li>
                        <li>
                            <a href="forms.html"><i class="fa fa-table fa-fw"></i> Request</a>
                        </li>
                        <li>
                             <a href="#"><i class="fa fa-reorder fa-fw"></i> Leave<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="createLeave">Create Leave</a>
                                </li>
                                <li>
                                    <a href="myListOfLeave">View My Leave</a>
                                </li>
                                <li>
                                    <a href="allListOfLeave">View List of Leave</a>
                                </li>
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
                                    <a href="???">View My Remote</a>
                                </li>
                                <li>
                                    <a href="buttons.html">View List of Remote</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-reorder fa-fw"></i> Training<span class="fa arrow"></span></a>
                               <ul class="nav nav-second-level">
                                <li>
                                    <a href="create">Create Training</a>
                                </li>

                                <li>
                                    <a href="panels-wells.html">View My Training</a>
                                </li>
                                <li>
                                    <a href="buttons.html">View List of Training</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-reorder fa-fw"></i> Procurement<span class="fa arrow"></span></a>
                             <ul class="nav nav-second-level">                                
                                <li>
                                    <a href="create">Create Procurement</a>
                                </li>
                                <li>
                                    <a href="panels-wells.html">View My Procurement</a>
                                </li>
                                <li>
                                    <a href="buttons.html">View List of Procurement</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-reorder fa-fw"></i>Overtime<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="create">Create Overtime</a>
                                </li>
                                <li>
                                    <a href="panels-wells.html">View My Overtime</a>
                                </li>
                                <li>
                                    <a href="buttons.html">View List of Overtime</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-files-o fa-fw"></i>Appraisal<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="panels-wells.html">View My Appraisal</a>
                                </li>
                                <li>
                                    <a href="buttons.html">View List of Appraisal</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-pencil fa-fw"></i>Feedback<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="blank.html">View List of Feedback</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-check-square-o fa-fw"></i> Survey<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="blank.html">View List of Survey</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>



                    </ul>
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
    <script src="/assets/plugins/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="/assets/plugins/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="/assets/plugins/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="/assets/plugins/raphael/raphael-min.js"></script>
    <script src="/assets/plugins/morrisjs/morris.min.js"></script>
    <!-- // <script src="../js/morris-data.js"></script> -->

    <!-- Custom Theme JavaScript -->
    <script src="/assets/js/sb-admin-2.js"></script>

</body>

</html>
