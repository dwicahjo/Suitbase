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
                <h1 class="page-header">My Training Requests</h1>
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
                    <div class="panel-body">
                        <div class="dataTable_wrapper">
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>No. </th>
                                        <th>Training Title</th>
                                        <th>Status</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="odd gradeX">
                                        <td class="center">1</td>
                                        <td class="center">Internet Explorer 4.0</td>
                                        <td class="center">Win 95+</td>
                                        <th><a href="editTraining" class="btn btn-default" role="button">Edit</a>
                                            <a href="resetUser" class="btn btn-default" role="button">Cancel</a></th>
                                    </tr>
                                    <tr class="even gradeC">
                                        <td>2</td>
                                        <td>Internet Explorer 5.0</td>
                                        <td>Win 95+</td><th><a href="editOvertime" class="btn btn-default" role="button">Edit</a>
                                            <a href="resetUser" class="btn btn-default" role="button">Cancel</a></th>
                                    </tr>
                                    <tr class="odd gradeA">
                                        <td>3</td>
                                        <td>Internet Explorer 5.5</td>
                                        <td>Win 95+</td>
                                        <th><a href="editTraining" class="btn btn-default" role="button">Edit</a>
                                            <a href="resetUser" class="btn btn-default" role="button">Cancel</a></th>
                                    </tr>
                                    <tr class="even gradeA">
                                        <td>4</td>
                                        <td>Internet Explorer 6</td>
                                        <td>Win 98+</td>
                                        <th><a href="editOvertime" class="btn btn-default" role="button">Edit</a>
                                            <a href="resetUser" class="btn btn-default" role="button">Cancel</a></th>
                                    </tr>
                                    <tr class="odd gradeA">
                                        <td>5</td>
                                        <td>Internet Explorer 7</td>
                                        <td>Win XP SP2+</td>
                                        <th><a href="editOvertime" class="btn btn-default" role="button">Edit</a>
                                            <a href="resetUser" class="btn btn-default" role="button">Cancel</a></th>
                                    </tr>
                                    <tr class="even gradeA">
                                        <td>6</td>
                                        <td>AOL browser (AOL desktop)</td>
                                        <td>Win XP</td>
                                        <th><a href="editOvertime" class="btn btn-default" role="button">Edit</a>
                                            <a href="resetUser" class="btn btn-default" role="button">Cancel</a></th>
                                    </tr>
                                    <tr class="gradeA">
                                        <td>7</td>
                                        <td>Firefox 1.0</td>
                                        <td>Win 98+ / OSX.2+</td>
                                        <th><a href="editOvertime" class="btn btn-default" role="button">Edit</a>
                                            <a href="resetUser" class="btn btn-default" role="button">Cancel</a></th>
                                    </tr>
                                    <tr class="gradeA">
                                        <td>8</td>
                                        <td>Firefox 1.5</td>
                                        <td>Win 98+ / OSX.2+</td>
                                        <th><a href="editOvertime" class="btn btn-default" role="button">Edit</a>
                                            <a href="resetUser" class="btn btn-default" role="button">Cancel</a></th>
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
