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
                <h1 class="page-header">PROCUREMENT DETAIL</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-4">
            </div>
            <div class="col-lg-8 detail">
                <div class="panel panel-default">
                    <div class="panel-heading">
                    </div>
                    <div class="panel-body">
                        <div class = "content">
                            <form class = "form-horizontal">
                                <div class = "form-group">
                                    <label class="col-md-4 control-label">Name</label>
                                    <div class = "right-side">
                                        <label class="col-md-6">: {{ $procurements[0]->employee->name }}</label>
                                    </div>
                                </div>
                                <div class = "form-group">
                                    <label class="col-md-4 control-label">Divison</label>
                                    <div class = "right-side">
                                        <label class="col-md-6">: {{ $procurements[0]->employee->division->name }}</label>
                                    </div>
                                </div>
                                <div class = "form-group">
                                    <label class="col-md-4 control-label"> Title </label>
                                    <div class = "right-side">
                                        <label class="col-md-6">: {{ $procurements[0]->title }}</label>
                                    </div>
                                </div>
                                <div class = "form-group">
                                    <label class="col-md-4 control-label">Price Estimate</label>
                                    <div class = "right-side">
                                        <label class="col-md-6">: Rp {{ $procurements[0]->estimate_price }}</label>
                                    </div>
                                </div>
                                <div class = "form-group">
                                        <label class="col-md-4 control-label">Description </label>
                                    <div class = "right-side">
                                        <label class="col-md-6">: {{ $procurements[0]->description }}</label>
                                    </div>
                                </div>
                                <div class = "form-group">
                                    <label class="col-md-4 control-label">Status </label>
                                    <div class = "right-side">
                                        <label class="col-md-6">: {{ $procurements[0]->status }}</label>
                                    </div>
                                </div>
                            </form>
                            <div class="form-group">
                                <div class="col-lg-6 col-md-offset-2">
                                    <a href="listOfProcurement" class="btn btn-default" role="button">Back</a>
                                <?php 
                                    $status = explode(" ", $procurements[0]->status);
                                ?>
                                @if ($status[0] == "Rejected" || $status[0] == "Approved" || $status[0] == "Cancelled")
                                        <button class="btn btn-default" disabled>Reject</button>
                                        <button class="btn btn-default" disabled>Approve</button>
                                @else   
                                        <a href="/rejectProcurement:{{ $procurements[0]->id }}" class="btn btn-default" role="button">Reject</a>
                                        <a href="/approveProcurement:{{ $procurements[0]->id }}" class="btn btn-default" role="button">Approve</a>
                                @endif
                                </div>
                            </div>
                            <!--row-->
                        </div><!--content-->
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            <!-- /.col-lg-8 -->
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