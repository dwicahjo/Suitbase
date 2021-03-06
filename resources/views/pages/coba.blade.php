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
                <h1 class="page-header">Leave Detail</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-2">
            </div>
            <div class="col-lg-8 detail">
                <div class="panel panel-default">
                    <div class="panel-heading">
                    </div>
                    <div class="panel-body">
                        <table class="table">
                                    <tbody>
                                        <tr>
                                            <td>Name</td>
                                            <td>{{ $leaves[0]->username }}</td>
                                        </tr>
                                        <tr>
                                            <td>Division</td>
                                            <td> {{ $leaves[0]->division }}</td>
                                        </tr>
                                        <tr>
                                            <td>Leave Type</td>
                                            <td>{{ $leaves[0]->type }}</td>
                                        </tr>
                                        <tr>
                                            <td>Start Date</td>
                                            <td>{{ $leaves[0]->date_start }}</td>
                                        </tr>
                                        <tr>
                                            <td>End Date</td>
                                            <td>{{ $leaves[0]->date_end }}</td>
                                        </tr>
                                        <tr>
                                            <td>Description</td>
                                            <td>{{ $leaves[0]->description }}</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                     </tbody>
                        </table>

                       
                                    <div class="row">
                                        <div class="col-md-2 col-md-offset-2">
                                            <a href="listOfLeave" class="btn btn-default" role="button">Back</a>
                                        </div>
                                        <div class="col-md-2">
                                             <a href="listOfLeave" class="btn btn-default" role="button">Reject</a>
                                        </div>
                                        <div class="col-md-2">
                                            <a href="listOfLeave" class="btn btn-default" role="button">Approve</a>
                                        </div>
                                    </div>
                                    <!--row-->
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /#wrapper -->
    @endsection
    <!-- jQuery -->
    <script src="/assets/plugins/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="/assets/plugins/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="/assets/plugins/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="/assets/js/sb-admin-2.js"></script>

</body>

</html>
