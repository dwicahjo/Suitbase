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
                <h1 class="page-header">Request Detail</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <form role="form">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <div class="form-group">
                                            <tr><td><label>Training Title: </label></td>
                                            <td><p> content </p></td></tr>
                                        </div>
                                        <div class="form-group">
                                            <tr><td><label>Date: </label></td>
                                            <td><p> content </p></td></tr>
                                        </div>
                                        
                                        <div class="form-group">
                                            <tr><td><label>Price Estimate: </label></td>
                                            <td><p> content </p></td></tr>
                                        </div>

                                        <div class="form-group">
                                            <tr><td><label>Description: </label></td>
                                            <td><p> content </p></td></tr>
                                        </div>

                                        <div class="form-group">
                                            <tr><td><label>Status: </label></td>
                                            <td><p> content </p></td></tr>
                                        </div>

                                    </table>
                                    <button type="submit" class="btn btn-default">Back</button>

                                </form>
                            </div>
                            
                        </div>
                        <!-- /.row (nested) -->
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