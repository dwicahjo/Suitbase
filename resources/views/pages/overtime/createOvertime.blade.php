@extends('layoutTemplate')
<!DOCTYPE html>
<html lang="en">

<head>

</head>

<body>
<<<<<<< HEAD
	@section('content')
=======
    @section('content')
>>>>>>> 2c597105d518500ff6ce263e6dcf3c8fe7732c1a
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Create Overtime Request</h1>
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
<<<<<<< HEAD
                            <div class="col-lg-6">
                                <form role="form">
                                    <div class="form-group">
                                        <label>Date</label>
                                        <input class="form-control" name = "date" type = "date" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Start Time</label>
                                        <input class="form-control" name = "starttime" type = "time" required>
                                    </div>
                                     <div class="form-group">
                                        <label>End Time</label>
                                        <input class="form-control" name = "endtime" type = "time" required>
                                    </div>
        
                                    <div class="form-group">
                                        <label>Description</label>
                                        <textarea class ="form-control" name = "description"> </textarea>
                                    </div>

                                    <button type="submit" class="btn btn-default">Submit Button</button>
                                </form>
=======
                            <div class="col-lg-12">
                                <div class = "content-form">
                                    <form class = "form-horizontal" role="form">
                                        <div class="form-group">
                                            <input name="_token" type="hidden" value="{{ csrf_token() }}">
                                            <label class="col-md-4 control-label">Date</label>
                                            <div class = "col-md-6">
                                                <input class="form-control" name = "date" type = "date" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Start Time</label>
                                            <div class = "col-md-6">
                                                <input class="form-control" name = "starttime" type = "time" required>
                                            </div> 
                                        </div>
                                        
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">End Time</label>
                                            <div class = "col-md-6">
                                                <input class="form-control" name = "endtime" type = "time" required>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Reason</label>
                                            <div class = "col-md-6">
                                                <textarea class ="form-control" name = "reason" required> </textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-6 control-label"></div>
                                            <div class = "col-md-2 col-md-offset-2">
                                                <button type="submit" class="btn btn-default">Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
>>>>>>> 2c597105d518500ff6ce263e6dcf3c8fe7732c1a
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
