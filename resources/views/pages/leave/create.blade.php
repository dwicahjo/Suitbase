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
                <h1 class="page-header">Create Leave Request</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                    </div>
                    <div class="panel-body">
                        <div class="row">
<<<<<<< HEAD
<<<<<<< HEAD
                            <div class="col-lg-6">
                                <form role="form">
=======
                            <div class="col-lg-6">
                                <form role="form" method="post" action="/storeLeave">
>>>>>>> 315374fbeca3037a61b981f8166a7cacbe3801bc
                                    <div class="form-group">
                                        <input name="_token" type="hidden" value="{{ csrf_token() }}">
                                        <label>Start Date</label>
                                        <input class="form-control" name = "startdate" type = "date" required>
                                    </div>
                                    <div class="form-group">
                                        <label>End Date</label>
                                        <input class="form-control" name = "enddate" type = "date" required>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label>Leave Type</label>
                                        <select class="form-control" name = "leavetype" required>
                                            <option>Sick</option>
                                            <option>Maternal</option>
                                            <option>Marriage</option>
                                            <option>Unpaid</option>
                                        </select>
                                    </div>
<<<<<<< HEAD

                                    <div class="form-group">
                                        <label>Reason</label>
                                        <textarea class ="form-control" name = "reason" required> </textarea>
                                    </div>

                                    <button type="submit" class="btn btn-default">Submit Button</button>
                                </form>
=======
                            <div class="col-lg-12">
                                <div class = "content-form">
                                    <form class = "form-horizontal" role="form">
                                        <div class="form-group">
                                            <input name="_token" type="hidden" value="{{ csrf_token() }}">
                                            <label class="col-md-4 control-label">Start Date</label>
                                            <div class = "col-md-6">
                                                <input class="form-control" name = "startdate" type = "date" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">End Date</label>
                                            <div class = "col-md-6">
                                                <input class="form-control" name = "enddate" type = "date" required>
                                            </div> 
                                        </div>
                                        
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Leave Type</label>
                                            <div class = "col-md-6">
                                                <select class="form-control" name = "leavetype" required>
                                                    <option>Sick</option>
                                                    <option>Maternal</option>
                                                    <option>Marriage</option>
                                                    <option>Unpaid</option>
                                                </select>
                                            </div>
                                        </div>
=======
>>>>>>> 315374fbeca3037a61b981f8166a7cacbe3801bc

                                    <div class="form-group">
                                        <label>Reason</label>
                                        <textarea class ="form-control" name = "reason" required> </textarea>
                                    </div>
<<<<<<< HEAD
                                    </form>
                                </div>
>>>>>>> 2c597105d518500ff6ce263e6dcf3c8fe7732c1a
=======

                                    <button type="submit" class="btn btn-default">Submit Button</button>
                                </form>
>>>>>>> 315374fbeca3037a61b981f8166a7cacbe3801bc
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
