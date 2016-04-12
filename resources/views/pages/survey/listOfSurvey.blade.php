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
                <h1 class="page-header">List of Surveys</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <!--<div class="panel-heading">
                        DataTables Advanced Tables
                    </div>-->
                    <!-- /.panel-heading -->
                        <div class="menu-survey">
                                            <a href="createSurvey">
                                                <i class="fa fa-pencil-square-o fa-fw"></i>
                                                <label>
                                                    Create Survey
                                                </label>
                                            </a>
                        </div>

                    <div class="panel-body">
                        <div class="dataTable_wrapper">
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Date Open </th>
                                        <th>Date Close</th>
                                        <th>Survey Title</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="odd gradeX">
                                        <td>11/04/2016</a></td>
                                        <td>15/04/2016</td>
                                        <td><a href="surveyDetails">Title 1</td>
                                        <th><a href="#" class="btn btn-default" role="button">Recap</a>
                                            <a href="#" class="btn btn-default" role="button">Export</a></th>
                                        
                                    </tr>
                                    <tr class="even gradeC">
                                        <td>11/04/2016</a></td>
                                        <td>15/04/2016</td>
                                        <td><a href="surveyDetails">Title 2</td>
                                        <th><a href="#" class="btn btn-default" role="button">Recap</a>
                                            <a href="#" class="btn btn-default" role="button">Export</a></th>
                                    </tr>
                                    <tr class="odd gradeA">
                                        <td>11/04/2016</a></td>
                                        <td>15/04/2016</td>
                                        <td><a href="surveyDetails">Title 3</td>
                                        <th><a href="#" class="btn btn-default" role="button">Recap</a>
                                            <a href="#" class="btn btn-default" role="button">Export</a></th>
                                    </tr>
                                    <tr class="even gradeA">
                                        <td>11/04/2016</a></td>
                                        <td>15/04/2016</td>
                                        <td><a href="surveyDetails">Title 4</td>
                                        <th><a href="#" class="btn btn-default" role="button">Recap</a>
                                            <a href="#" class="btn btn-default" role="button">Export</a></th>
                                    </tr>
                                    <tr class="odd gradeA">
                                        <td>11/04/2016</a></td>
                                        <td>15/04/2016</td>
                                        <td><a href="surveyDetails">Title 5</td>
                                        <th><a href="#" class="btn btn-default" role="button">Recap</a>
                                            <a href="#" class="btn btn-default" role="button">Export</a></th>
                                    </tr>
                                    <tr class="even gradeA">
                                        <td>11/04/2016</a></td>
                                        <td>15/04/2016</td>
                                        <td><a href="surveyDetails">Title 6</td>
                                        <th><a href="#" class="btn btn-default" role="button">Recap</a>
                                            <a href="#" class="btn btn-default" role="button">Export</a></th>
                                    </tr>
                                    <tr class="gradeA">
                                        <td>11/04/2016</a></td>
                                        <td>15/04/2016</td>
                                        <td><a href="surveyDetails">Title 7</td>
                                        <th><a href="#" class="btn btn-default" role="button">Recap</a>
                                            <a href="#" class="btn btn-default" role="button">Export</a></th>
                                    </tr>
                                    <tr class="gradeA">
                                        <td>11/04/2016</a></td>
                                        <td>15/04/2016</td>
                                        <td><a href="surveyDetails">Title 8</td>
                                        <th><a href="#" class="btn btn-default" role="button">Recap</a>
                                            <a href="#" class="btn btn-default" role="button">Export</a></th>
                                    </tr>
                                    <tr class="gradeA">
                                        <td>11/04/2016</a></td>
                                        <td>15/04/2016</td>
                                        <td><a href="surveyDetails">Title 9</td>
                                        <th><a href="#" class="btn btn-default" role="button">Recap</a>
                                            <a href="#" class="btn btn-default" role="button">Export</a></th>
                                    </tr>
                                    <tr class="gradeA">
                                        <td>11/04/2016</a></td>
                                        <td>15/04/2016</td>
                                        <td><a href="surveyDetails">Title 10</td>
                                        <th><a href="#" class="btn btn-default" role="button">Recap</a>
                                            <a href="#" class="btn btn-default" role="button">Export</a></th>

                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.table-responsive -->
                        
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
      
        </div>
        <!-- /#page-wrapper -->
        @endsection

    <!-- jQuery -->
    <script src="/assets/plugins/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="/assets/plugins/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="/assets/plugins/metisMenu/dist/metisMenu.min.js"></script>

    <!-- DataTables JavaScript -->
    <script src="/assets/plugins/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="/assets/plugins/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="/assets/js/sb-admin-2.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference 
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });
    });
    </script>-->

</body>

</html>
