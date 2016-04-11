@extends('layoutTemplate')
<!DOCTYPE html>
<html lang="en">

<head>
</head>

<body>
    @section('content')

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">List Of Appraisals</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
<<<<<<< HEAD
            <div class="panel panel-default">
=======
            <div class="col-lg-12">
                <div class="panel panel-default">
>>>>>>> 2c597105d518500ff6ce263e6dcf3c8fe7732c1a
                    <!--<div class="panel-heading">
                        DataTables Advanced Tables
                    </div>-->
                    <!-- /.panel-heading -->
                    <div class="panel-body">
<<<<<<< HEAD
                        <div class="row">
                           
                        <div class="filter_menu">
             
                            <div class="dropdown">
                            <div class="col-lg-4">
=======
                        <div class="dataTable_wrapper">
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Period</th>
                                        <th>Employee Name</th>
                                        <th>Division</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>

                        <div class="filter_menu">
                            <div class="dropdown">
>>>>>>> 2c597105d518500ff6ce263e6dcf3c8fe7732c1a
                                <button class="btn btn-primary dropdown-toggle" placeholder="Search for..." type="button" data-toggle="dropdown">Choose Periode
                                <span class="caret"></span></button>
                                <ul class="dropdown-menu">
                                  <li><a href="#">2016</a></li>
                                  <li><a href="#">2015</a></li>
                                  <li><a href="#">2014</a></li>
                                </ul>
                            </div>
<<<<<<< HEAD
                            </div>
                           
                            <div class="dropdown">
                                <div class="col-lg-4">
=======
                            <div class="dropdown">
>>>>>>> 2c597105d518500ff6ce263e6dcf3c8fe7732c1a
                                <button class="btn btn-primary dropdown-toggle" placeholder="Search for..." type="button" data-toggle="dropdown">Choose Division
                                <span class="caret"></span></button>
                                <ul class="dropdown-menu">
                                  <li><a href="#">PR</a></li>
                                  <li><a href="#">Creative</a></li>
                                  <li><a href="#">IT</a></li>
                                </ul>
                            </div>
                        </div>
<<<<<<< HEAD
                        </div>

                        <div class="col-lg-4">
                        <input type="text" class="form-control" placeholder="Search for..">
                            <span class="input-group-btn">
                            <button class="btn btn-default" type="button">Go!</button>
                            </span>
                        </input>
                        </div>
                        
                        <div class="col-lg-4">
                        <button style="margin-left: 100px" type="submit" class="btn btn-default">View Recap</button>
                        </div>
                    </div>

                    <div class="row">
                            <div class="dataTable_wrapper">
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th style="text-align: center">Period</th>
                                        <th style="text-align: center">Employee Name</th>
                                        <th style="text-align: center">Division</th>
                                    </tr>
                                </thead>
                            </table>
                            </div>         
                    </div>
                        
                        <div class="row">
                        <!-- /.table-responsive -->
                        <div class="well">
                            <a class="btn btn-default btn-lg btn-block" target="_blank" href="https://datatables.net/">View DataTables Documentation</a>
                        </div>
                        </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel-default -->
        </div>
        <!-- /.row -->
      
    </div>
=======
                         <input type="text" class="form-control" placeholder="Search for...">
                        <span class="input-group-btn">
                        <button class="btn btn-default" type="button">Go!</button>
                        </span>

                         <button type="submit" class="btn btn-default">View Recap</button>
                        <!-- /.table-responsive -->
                        <div class="well">
                            <h4>DataTables Usage Information</h4>
                            <p>DataTables is a very flexible, advanced tables plugin for jQuery. In SB Admin, we are using a specialized version of DataTables built for Bootstrap 3. We have also customized the table headings to use Font Awesome icons in place of images. For complete documentation on DataTables, visit their website at <a target="_blank" href="https://datatables.net/">https://datatables.net/</a>.</p>
                            <a class="btn btn-default btn-lg btn-block" target="_blank" href="https://datatables.net/">View DataTables Documentation</a>
                        </div>
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
      
        </div>
>>>>>>> 2c597105d518500ff6ce263e6dcf3c8fe7732c1a
        <!-- /#page-wrapper -->
        @endsection

    <!-- jQuery -->
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- DataTables JavaScript -->
    <script src="../bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="../bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

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
