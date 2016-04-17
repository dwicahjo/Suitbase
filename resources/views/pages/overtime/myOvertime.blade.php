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
                <h1 class="page-header">MY OVERTIME REQUESTS</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                    </div>
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
                                        <th>Date</th>
                                        <th>Start Time</th>
                                        <th>End Time</th>
                                        <th>Total Hours</th>
                                        <th>Status</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i=1; ?>
                                    @foreach ($overtimes as $overtime)
                                    <tr class="odd gradeA">
                                        <td><a href='/overtimeDetails:{{$overtime->id}}'>{{$i}}</td>
                                        <td>{{$overtime->date}}</td>
                                        <td>{{$overtime->time_start}}</td>
                                        <td>{{$overtime->time_end}}</td>
                                        <td>{{$overtime->time_end - $overtime->time_start}}</td>
                                        <td>{{$overtime->status}}</td>
                                        <?php 
                                            $status = explode(" ", $overtime->status);
                                        ?>
                                        @if ($status[0] == "Rejected" || $status[0] == "Approved" || $status[0] == "Cancelled")
                                            <th>
                                                <button type="submit" class="btn btn-default btn-edit" disabled="">Edit</button>
                                                <button type="submit" class="btn btn-default btn-danger" disabled="">Cancel</button>
                                            </th>
                                        @else
                                            <th><a href="/editOvertime:{{ $overtime->id }}" class="btn btn-default btn-edit" role="button">Edit</a>
                                            <a href="/cancelOvertime:{{ $overtime->id }}" class="btn btn-default btn-danger" role="button">Cancel</a></th>
                                        @endif
                                    </tr>
                                    <?php $i++; ?>
                                    @endforeach
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
