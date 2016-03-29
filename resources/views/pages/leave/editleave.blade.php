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
                <h1 class="page-header">Edit Leave Request</h1>
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
                                    <div class="form-group">
                                        <label>Start Date</label>
                                        <input class="form-control" name = "startdate" type = "date" placeholder="Old content">
                                    </div>
                                    <div class="form-group">
                                        <label>End Date</label>
                                        <input class="form-control" name = "enddate" type = "date" placeholder="Old content">
                                    </div>
                                    
                                    <div class="form-group">
                                        <label>Leave Type</label>
                                        <select class="form-control" name = "leavetype">
                                            <option>Sick</option>
                                            <option>Maternal</option>
                                            <option>Marriage</option>
                                            <option>Unpaid</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Reason</label>
                                        <textarea class ="form-control" name = "reason" placeholder="Old content"> </textarea>
                                    </div>

                                    <button type="submit" class="btn btn-default">Submit Button</button>
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
